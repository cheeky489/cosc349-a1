# -*- mode: ruby -*-
# vi: set ft=ruby :

# A Vagrantfile to set up two VMs, a frontend UI, database, and a backend.

Vagrant.configure("2") do |config|
    # config.vm.box = "generic/gentoo"
    config.vm.hostname = "ubuntu"

    config.vm.provider :docker do |docker, override|
        override.vm.box = nil
        docker.image = "anthonyydng/vagrant-provider:ubuntu"
        docker.remains_running = true
        docker.has_ssh = true
        docker.privileged = true
        docker.volumes = ["/sys/fs/cgroup:/sys/fs/cgroup:rw"]
        docker.create_args = ["--cgroupns=host"]
      end
    
    # # VM 1 - Frontend UI
    config.vm.define "frontend" do |frontend|
        frontend.vm.hostname = "frontendserver"
    end

    # # VM 2 - Database
    config.vm.define "db" do |db|

    end

    # # VM 3 - Backend
    config.vm.define "backend" do |backend|
        backend.vm.hostname = "backendserver"
    end
end