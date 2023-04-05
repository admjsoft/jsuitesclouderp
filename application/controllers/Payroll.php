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

            return match ($data['employee']['salary_type']) {
                0 => $this->calculate_monthly_payslip(),
                1 => $this->calculate_daily_payslip(),
                2 => $this->calculate_hourly_payslip(),
                default => 0,
            };
        }
    }

    protected function calculate_monthly_payslip(): float
    {
        return 0;
    }

    protected function calculate_daily_payslip(): float
    {
        return 0;
    }

    protected function calculate_hourly_payslip(): float
    {
        return 0;
    }
}
