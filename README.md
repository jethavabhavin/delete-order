# Overview
## Purpose of module

Inficode\DeleteOrder module is responsible for delete orders and order related invoice and shippings in system,
Inficode\DeleteOrder module manages next system entities and flows:

* order deletion
* invoice deletion
* shipment deletion (including tracks management)
* credit memos deletion

Inficode\DeleteOrder module is required for Magento\Sales module to perform order delete operations.

# Deployment
## System requirements

The Inficode_DeleteOrder module does not have any specific system requirements.
Depending on how many orders are being placed, there might be consideration for the database size

## Install
The Inficode_DeleteOrder module is installed automatically (using the native Magento install mechanism) without any additional actions.