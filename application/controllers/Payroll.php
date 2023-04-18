<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payroll extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model', 'employee');
        $this->load->model('general_settings_model', 'general_settings');
        $this->load->library("Aauth");
        if (!$this->aauth->is_loggedin()) {
            redirect('/user/', 'refresh');
        }
        if (!$this->aauth->premission(9)) {
            exit('<h3>Sorry! You have insufficient permissions to access this section</h3>');
        }
        $this->li_a = 'payroll';
    }

    public function payslip_form()
    {
        $head['usernm'] = $this->aauth->get_user()->username;
        $head['title'] = 'Payslip';
        $data['employees'] = $this->employee->list_employee();
        $this->load->view('fixed/header', $head);
        $this->load->view('payroll/payslip-form', $data);
        $this->load->view('fixed/footer');
    }

    public function payslip()
    {
        if ($this->input->post('employee')) {
            $data['employee'] = $this->employee->get_employee($this->input->post('employee'));
            if (! $data['employee']) {
                exit('<h3>Sorry! Employee not found</h3>');
            }

            $data['salary'] = match ($data['employee']['salary_type']) {
                0 => $this->calculate_monthly_payslip($data['employee'], $this->input->post('year'), $this->input->post('month')),
                1 => $this->calculate_daily_payslip($data['employee'], $this->input->post('year'), $this->input->post('month')),
                2 => $this->calculate_hourly_payslip($data['employee'], $this->input->post('year'), $this->input->post('month')),
                default => null,
            };

            echo "<pre>";
            print_r($data);
            exit;

            return $data;
        }
    }

    protected function calculate_salary($salary, $employee): array
    {
        $data['gross'] = $salary;
        if ($employee['epf']) {
            $salary = $salary - $this->calculate_epf($salary, $employee['epf']);
        }

        if ($employee['socso_enabled']) {
            $salary = $salary - $this->calculate_socso($salary);
        }

        if ($employee['eis_enabled']) {
            $salary = $salary - $this->calculate_eis($salary);
        }

        if ($employee['hrdf_enabled']) {
            $salary = $salary - $this->calculate_hrdf($salary);
        }

        $data['nett'] = $salary;
        return $data;
    }

    protected function calculate_monthly_payslip($employee, $year, $month): array
    {
        $payrollSettings = $this->general_settings->get_settings('general-payroll');
        $date = new DateTime($employee['joindate']);
        if ($date > new DateTime($year.'-'.$month.'-'.date('d'))) {
            return [];
        }
        $diff = $date->diff(new DateTime($year.'-'.$month.'-'.date('d')));
        $nextMonth = $date->modify('+ 1 month');

        $salary = $employee['salary'];
        if ($nextMonth < new DateTime($year.'-'.$month.'-'.date('d'))) {
            $workingDays = 26;
            if ($payrollSettings) {
                $workingDays = json_decode($payrollSettings[0]['data_json'], true)['working_days'];
            }
            $salary = $salary * $diff->format('%a') / $workingDays;
        }

        return $this->calculate_salary($salary, $employee);
    }

    protected function calculate_daily_payslip($employee, $year, $month): array
    {
        $salary = $employee['salary'];
        return $this->calculate_salary($salary, $employee);
    }

    protected function calculate_hourly_payslip($employee, $year, $month): array
    {
        $salary = $employee['salary'];
        return $this->calculate_salary($salary, $employee);
    }

    protected function calculate_epf($salary, $percentage): float
    {
//        $epfSettings = $this->general_settings->get_settings('epf-settings');
//        $percentage = 13;
//        if ($epfSettings) {
//            $percentage = json_decode($epfSettings[0]['data_json'], true)['employer_addon_percentage'];
//        }
        return $salary * $percentage / 100;
    }

    protected function calculate_socso($salary): float
    {
        return $salary * $percentage / 100;
    }

    protected function calculate_eis($salary): float
    {
        return $salary * 0.2 / 100;
    }

    protected function calculate_hrdf($salary): float
    {
        $epfSettings = $this->general_settings->get_settings('-settings');
        $percentage = 13;
        if ($epfSettings) {
            $percentage = json_decode($epfSettings[0]['data_json'], true)['employer_addon_percentage'];
        }
        return $salary * $percentage / 100;
    }
}
