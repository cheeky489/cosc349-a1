# COSC349 assignment 1 (2024): 

Using virtualisation to effect portable building and deployment of software applications.
This repo contains the files required to build and deploy a bookmark management tool hosted using 3 separate VMs.

## Instructions

### Prerequisites

1. Vagrant
2. Docker

### Building the application

Commands to run in command-line:
1. docker pull anthonyydng/vagrant-provider:ubuntu
2. vagrant up --provider=docker

### Running the application

Navigate to [http://127.0.0.1:8080/]{http://127.0.0.1:8080/} and you will be greeted by the main page.
There will be some data included.