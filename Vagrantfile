# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "precise32"
  config.vm.box_url = "http://files.vagrantup.com/precise32.box"

  config.vm.provider :virtualbox do |vb|
    vb.customize ["modifyvm", :id, "--memory", "1024"]
  end

  config.vm.synced_folder "./", "/var/www/omnomhub", id: "vagrant-root", nfs: true

  config.vm.network :private_network, ip: "192.168.13.37"
  config.vm.network "forwarded_port", guest: 7474, host: 7474
  config.vm.network "forwarded_port", guest: 80, host: 8383

  config.vm.provision "ansible" do |ansible|
    ansible.playbook = "ansible/provision.yml"
    #ansible.inventory_path = "ansible/inventory"
  end
end
