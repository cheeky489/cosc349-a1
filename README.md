# COSC349 assignment 1 (2024): 

Using virtualisation for building and deployment of software applications.
This repository contains the files required to build and deploy a bookmark management tool hosted using 3 separate VMs.

## Instructions

### Prerequisites

1. Vagrant - https://developer.hashicorp.com/vagrant/install?product_intent=vagrant
2. Docker - https://www.docker.com/products/docker-desktop/

### Building the application

Clone this git repo onto your personal machine:
<code>https://github.com/cheeky489/cosc349-a1.git</code>

Navigate to the cloned repository directory.

Then run the following command in the command-line:
> vagrant up --provider=docker

### Running the application

Now the VMs should be up and running.

Navigating to [http://127.0.0.1:8080/](http://127.0.0.1:8080/ "Front facing page") will take you to the main page.