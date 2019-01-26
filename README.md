# Overview

## Description
Delete Order module helps shop owner to delete unwanted order from the system. The owner can delete form Order grid and view page in the admin, also add ACL for mange permission.

Provide all details of your extension’s features and functionality. Include any updates.

Delete Order module helps shop owner to delete unwanted order from the system. For now, Magento not allowed to the admin user to delete the order from the system. The owner can delete form Order grid and view page in the admin, also add ACL for mange permission. 

The Admin user just needs to login with Magento admin and if he has permission for deleting order then the admin able to delete order just clicking on delete button on order view page and also extra feature in module user have mass action for delete order in order grid. So not needed to go to order view page and click delete button to each order, he just select order which he not want in system and select delete action from mass action dropdown option and click on submit, after submit module delete order confirmation popup will appear then after confirming from user module will delete order and order related entity from system.

Delete Order responsible for delete order and order related other data from the system. so after deleting the order from the system not consume extra space in your database.

## Purpose of module

Bhavin\DeleteOrder module is responsible for delete orders and order related invoice and shippings in system,
Bhavin\DeleteOrder module manages next system entities and flows:

* order deletion
* invoice deletion
* shipment deletion (including tracks management)
* credit memos deletion

Bhavin\DeleteOrder module is required for Magento\Sales module to perform order delete operations.

## Key Features 
* Easy to install with default Magento extension installation 
* Easy to configure from the backend.
* Safe solution to delete Magento orders
* Allow removing single, many or all orders simultaneously
* Manage permission from Magento role
* Enable/Disable extension feature 
* Configuration to choose order status to allow delete operation.
* Delete Order related data like shipping info, Invoice and Credit Memo
* Compatible with Magento 2.2.x versions in Community Editions
 
## Future Enhancement 
* Add delete order role back feature so the admin can easily get back all delete order data to the system.
* Report for delete order so the admin finds who delete a record and on which date. 


# Deployment
## System requirements

The Bhavin_DeleteOrder module does not have any specific system requirements.
Depending on how many orders are being placed, there might be consideration for the database size

## Install
The Bhavin_DeleteOrder module is installed automatically (using the native Magento install mechanism) without any additional actions.