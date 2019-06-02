# Overview

## Short Description
Delete Order module allow Administrators to delete their unwanted orders from the admin. The admin user just needs to enable the extension from the admin configuration and after that,  the admin will be able to delete their orders from sales orders.


## Description
Provide all details of your extension’s features and functionality. Include any updates.

Delete Order module allows Administrators to delete their unwanted orders from the admin. The admin user just needs to enable the extension from the admin configuration and after that, the admin will be able to delete their orders from sales grid and order view page, also add ACL to manage permission. 

Admin users need to log in with Magento Admin.  If the admin has permission to delete order then admin will able to delete the order by clicking on the delete button on order view page.  It also has a feature to delete mass orders in order grid. Hence, no need to delete individual orders, select unwanted orders and select delete action from mass action drop down option and click on submit. After submitting delete order confirmation popup will appear then after confirming from the user,  it will delete order and order related entity from the system.

By using Delete Order, the order will be deleted and with related data will also delete from the database hence it will not consume unwanted space in the system.


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
* Easy to configure from the back-end.
* Safe solution to delete Magento orders
* Allow removing single, multiple or all orders simultaneously
* Manage permission from Magento role
* Enable/Disable extension feature 
* Configuration to choose order status to allow delete operation.
* Delete Order related data like shipping info, Invoice and Credit Memo
* Compatible with Magento 2.2.x versions in Community Editions
 
## Future Enhancement 
* Add delete order role back feature so the admin can easily get back all deleted order data to the system.
* Report for delete order so the admin will able to find who delete a record and on which date. 

# Deployment
## System requirements

The Bhavin_DeleteOrder module does not have any specific system requirements.
Depending on how many orders are being placed, there might be consideration for the database size

## Install
The Bhavin_DeleteOrder module is installed automatically (using the native Magento install mechanism) without any additional actions.