<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Payroll extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('employee_model', 'employee');
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

            switch ($data['employee']['salary_type']) {
                case 0:
                    $data['salary'] = $this->calculate_monthly_payslip($data['employee'], $this->input->post('year'), $this->input->post('month'));
                    break;
                case 1:
                    $data['salary'] = $this->calculate_daily_payslip($data['employee'], $this->input->post('year'), $this->input->post('month'));
                    break;
                case 2:
                    $data['salary'] = $this->calculate_hourly_payslip($data['employee'], $this->input->post('year'), $this->input->post('month'));
                    break;
                default:
                    $data['salary'] = null;
            }

            echo "<pre>";
            print_r($data);
            exit;

            return $data;
        }
    }

    protected function calculate_monthly_payslip($employee, $year, $month): array
    {
        $date = new DateTime($employee['joindate']);
        $diff = $date->diff(new DateTime());
        $nextMonth = $date->modify('+ 1 month');

        $salary = $employee['salary'];
        if ($nextMonth > new DateTime()) {
            $salary = $salary * $diff->format('%a') / 25;
        }

        $data['gross'] = $salary;
        if ($employee['epf_enabled']) {
            $salary = $this->calculcate_epf($salary);
        }

        if ($employee['hrdf_enabled']) {
            $salary = $this->calculcate_hrdf($salary);
        }

        $data['nett'] = $salary;
        return $data;
    }

    protected function calculate_daily_payslip($employee): array
    {
        $date = new DateTime($employee['joindate']);
        $diff = $date->diff(new DateTime());

        $salary = $employee['salary'] * $diff->format('%a');

        $data['gross'] = $salary;
        if ($employee['epf_enabled']) {
            $salary = $this->calculcate_epf($salary);
        }

        if ($employee['hrdf_enabled']) {
            $salary = $this->calculcate_hrdf($salary);
        }

        $data['nett'] = $salary;
        return $data;
    }

    protected function calculate_hourly_payslip($employee): array
    {
        $date = new DateTime($employee['joindate']);
        $diff = $date->diff(new DateTime());

        $salary = $employee['salary'] * $diff->format('%a');

        $data['gross'] = $salary;
        if ($employee['epf_enabled']) {
            $salary = $this->calculcate_epf($salary);
        }

        if ($employee['hrdf_enabled']) {
            $salary = $this->calculcate_hrdf($salary);
        }

        $data['nett'] = $salary;
        return $data;
    }

    protected function calculcate_epf($salary): float
    {
        return $salary * 10 / 100;
    }

    protected function calculcate_hrdf($salary): float
    {
        return $salary * 10 / 100;
    }
}
