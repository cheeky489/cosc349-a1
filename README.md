# COSC349 assignment 1 (2024): 

This repository contains the files required to build and deploy a bookmark management tool hosted using 3 separate VMs.

## Overview of Application/VMs

This application is a bookmark management tool that keeps a collection of website links along with an appropriate short description and tags. So far the functionality of the tool is limited to viewing and editing the bookmarks. 

The application is created using 3 VMs, all of which are described as follows:
- The first VM is a webserver that contains the main page of the application.
- The second VM is database server that stores the bookmark data.
- The third VM is a webserver that contains the functionality that allows the user to change data in the database from the bookmark tool site.

## Instructions to Build and Deploy

### Prerequisites

1. Vagrant - `https://developer.hashicorp.com/vagrant/install?product_intent=vagrant`
2. Docker - `https://www.docker.com/products/docker-desktop/`

### Building the application

Clone this git repo onto your personal machine:
`https://github.com/cheeky489/cosc349-a1.git`

Navigate to the cloned repository directory.

Then run the following command in the command-line:
> vagrant up --provider=docker

### Running the application

Now the VMs should be up and running.

Navigating to [http://127.0.0.1:8080/](http://127.0.0.1:8080/ "Front facing page") will take you to the main page.

### Cleaning up

Once done with the application, navigate to the project directory command-line and enter:
> vagrant halt

All  VMs should stop running and now enter:
> vagrant destroy

Press `y` followed by `Enter` when prompted for every VM to remove them from your personal machine.