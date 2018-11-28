# Overview
## Purpose of module

Bhavin\DeleteOrder module is responsible for delete orders and order related invoice and shippings in system,
Bhavin\DeleteOrder module manages next system entities and flows:

* order deletion
* invoice deletion
* shipment deletion (including tracks management)
* credit memos deletion

Bhavin\DeleteOrder module is required for Magento\Sales module to perform order delete operations.

# Deployment
## System requirements

The Bhavin_DeleteOrder module does not have any specific system requirements.
Depending on how many orders are being placed, there might be consideration for the database size

## Install
The Bhavin_DeleteOrder module is installed automatically (using the native Magento install mechanism) without any additional actions.