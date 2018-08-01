/* 04/04/2018 By Kaoly */

ALTER TABLE `erp_quote_items`
ADD COLUMN `product_invoice`  varchar(255) NULL AFTER `product_noted`;

ALTER TABLE `erp_sale_items`
ADD COLUMN `product_invoice`  varchar(255) NULL AFTER `price_id`;

ALTER TABLE erp_sale_order_items
ADD COLUMN product_invoice varchar(255) NULL AFTER product_noted;

ALTER TABLE `erp_sale_items`
ADD COLUMN `amount_quantity` decimal(15, 0) NULL AFTER `quantity_received`;

ALTER TABLE `erp_sale_order_items`
ADD COLUMN `amount_quantity` decimal(15, 0) NULL AFTER `quantity_received`;