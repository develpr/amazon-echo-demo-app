# Physica API #

##Installing Dev Environment

* Install [Vagrant](http://www.vagrantup.com)
* Install [VirtualBox](https://www.virtualbox.org)
* Install [librarian-chef](https://github.com/applicationsonline/librarian-chef)
* Install the following Vagrant plugins

This will make sure the guest machine is up to date
`vagrant plugin install vagrant-vbguest`

This will be sure that we have the latest version of Chef
`vagrant plugin install vagrant-omnibus`

This will automatically setup your host machine's hosts file so you can access the host via domain
`vagrant plugin install vagrant-hostmanager`
