CREATE TABLE `gtg`.`general_settings` (
    `id` int NOT NULL AUTO_INCREMENT,
    `module_code` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `data_json` JSON NOT NULL,
    `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `gtg`.`general_settings`(
    `module_code`,
    `name` ,
    `data_json`,
    `updated_at`
)
VALUES (
    'general-payroll',
    'General Payroll Settings',
    '{"signatory_name": "John Doe", "standard_working_hours": 8, "report_show_zero": false, "ordinary_rate_pay_month": 0, "ordinary_rate_pay_day": 0, "ordinary_rate_pay_hour": 0, "working_days": 26, "wage_type": 0, "compensation_rounding": 1}',
    NOW()
);

INSERT INTO `gtg`.`general_settings`(
    `module_code`,
    `name` ,
    `data_json`,
    `updated_at`
)
VALUES (
    'epf-settings',
    'EPF Settings',
    '{"employer_rate": 0, "employer_addon_percentage": 0, "non_malaysian_epf": false}',
    NOW()
);

INSERT INTO `gtg`.`general_settings`(
    `module_code`,
    `name` ,
    `data_json`,
    `updated_at`
)
VALUES (
    'overtime-settings',
    'Overtime Settings',
    '{"normal_rate": 0, "public_holiday_rate": 0, "extra_rate": 0}',
    NOW()
);

ALTER TABLE `gtg`.`gtg_employees` ADD salary_type int(1) DEFAULT 0 AFTER degis;
ALTER TABLE `gtg`.`gtg_employees` ADD epf_enabled int(1) DEFAULT 0 AFTER salary;
ALTER TABLE `gtg`.`gtg_employees` ADD hrdf_enabled int(1) DEFAULT 0 AFTER epf_enabled;