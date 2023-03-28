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
    '{"signatory_name": "John Doe", "standard_working_hours": 8, "report_show_zero": false}',
    NOW()
);