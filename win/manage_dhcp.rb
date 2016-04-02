#!/usr/bin/ruby
require "erb"
require "mysql"
class Dhcp_header
        def initialize domain_name_server, default, max, data_dhcp, data_subnet, data_subnet_eth0, data_class_wifi
                @domain_name_server = domain_name_server
                @default = default
                @max = max
		@data_dhcp = data_dhcp
		@data_subnet = data_subnet
		@data_subnet_eth0 = data_subnet_eth0
		@data_class_wifi = data_class_wifi
        end
        def render path
                content = File.read(File.expand_path(path))
                t = ERB.new(content,nil,'%<>-')
                t.result(binding)
        end
end

######################################################################################################################

	con = Mysql.new 'localhost', 'root', 'qwerty', 'dhcp'
	data_dhcp = con.query("SELECT * FROM `class1` union SELECT * FROM `class2` union SELECT * FROM `class3` union SELECT * FROM `class4`")
	data_class_wifi = con.query("SELECT * FROM `class_wifi`")
	data_subnet = con.query("SELECT * FROM subnet")
	data_subnet_eth0 = con.query("SELECT * FROM subnet")
	insert_dhcp = Dhcp_header.new("158.108.0.2,158.108.0.3","3600","7200",data_dhcp,data_subnet,data_subnet_eth0,data_class_wifi)

	file_dhcp = File.open("/etc/dhcp/dhcpd.conf", 'w') 
	file_dhcp.puts insert_dhcp.render("/var/www/html/win/template_dhcp.erb")
	file_dhcp.close

	file_dhcp = File.open("/etc/network/interfaces", 'w')
	file_dhcp.puts insert_dhcp.render("/var/www/html/win/template_eth0.erb")
	file_dhcp.close

