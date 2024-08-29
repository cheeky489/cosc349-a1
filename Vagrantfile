# -*- mode: ruby -*-
# vi: set ft=ruby :

# A Vagrantfile to set up two VMs, a UI, database, and a backend.

Vagrant.configure("2") do |config|
    config.vm.provision "shell", inline: "echo Hello"
    
    # VM 1 - UI
    config.vm.define "ui" do |ui|

    end

    # VM 2 - Database
    config.vm.define "db" do |db|
        db.vm.box = "mysql"
    end

    # VM 3 - Backend
    config.vm.define "backend" do |backend|

    end

end