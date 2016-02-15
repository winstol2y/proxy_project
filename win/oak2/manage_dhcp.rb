#!/usr/bin/ruby
require "erb"
require "mysql"
class Dhcp_header
        def initialize domain_name_server, default, max, data_dhcp, data_subnet
                @domain_name_server = domain_name_server
                @default = default
                @max = max
		@data_dhcp = data_dhcp
		@data_subnet = data_subnet
        end
        def render path
                content = File.read(File.expand_path(path))
                t = ERB.new(content,nil,'%<>-')
                t.result(binding)
        end
end
#class Dns_header
#	def initialize zone, date_now, count_serial, refresh, retry1, expire, minimum, data_dns
#		@zone = zone
#		@date_now = date_now
#		@count_serial = count_serial
#		@refresh = refresh
#		@retry1 = retry1
#		@expire = expire
#		@minimum = minimum
#		@data_dns = data_dns
#	end
#	def render path
#		content = File.read(File.expand_path(path))
#		t = ERB.new(content,nil,'%<>-')
#		t.result(binding)
#	end
#end
#class Named_config
#	def initialize zone_union
#		@zone_union = zone_union
#	end
#	def render path
#		content = File.read(File.expand_path(path))
#		t = ERB.new(content,nil,'%<>-')
#		t.result(binding)
#	end
#end
#	`rm /usr/local/etc/namedb/dynamic/*`
	con = Mysql.new 'localhost', 'root', 'qwerty', 'dhcp'
	con_subnet = Mysql.new 'localhost', 'root', 'qwerty', 'dhcpd'
	data_dhcp = con.query("SELECT * FROM `class1` union SELECT * FROM `class2` union SELECT * FROM `class3` union SELECT * FROM `class4` union SELECT * FROM `class5`")
	data_subnet = con_subnet.query("SELECT * FROM config_subnet")
	insert_dhcp = Dhcp_header.new("158.108.0.2,158.108.0.3","3600","7200",data_dhcp,data_subnet)

#	zone_union = con.query("SELECT zone FROM ipv4 UNION SELECT zone FROM ipv4")
#	zone_union2 = con.query("SELECT zone FROM ipv4 UNION SELECT zone FROM ipv4")

#	insert_named = Named_config.new(zone_union)
#	file_named_config = File.open("/usr/local/etc/namedb/named.conf", 'w')
#	file_named_config.puts insert_named.render("/usr/local/www/dhcp/template_named_config.erb")
#	file_named_config.close

	file_dhcp = File.open("/var/www/html/win/dhcpd.conf", 'w') 
	file_dhcp.puts insert_dhcp.render("/var/www/html/win/template_dhcp.erb")
	file_dhcp.close

#	count = File.open("/usr/local/www/dhcp/count.txt", "r")
#	count_serial = count.gets.to_i
#	count_serial1 = sprintf('%02d',count_serial)
#	date_now = Time.now.strftime("%Y%m%d")
#	
#	zone_union2.each_hash do |rows|
#		zone1 = rows['zone']
#		file_config_dns = "/usr/local/etc/namedb/dynamic/#{rows['zone']}"
#		data_dns = con.query("SELECT * FROM ipv4 WHERE ipv4.`zone` = '#{zone1}'")
#		zone_detail = con.query("SELECT * FROM zone_detail")
#		file_dns = File.open(file_config_dns, 'w')
#		zone_detail.each_hash do |config_zone_detail|
#			insert_dns_head = Dns_header.new(zone1, date_now, count_serial1, "#{config_zone_detail['refresh']}", "#{config_zone_detail['retry']}", "#{config_zone_detail['expire']}", "#{config_zone_detail['minimum']}", data_dns)
#		file_dns.puts insert_dns_head.render("/usr/local/www/dhcp/template_dns.erb")
#		file_dns.close
#		end
#	end
#	count1 = File.open("/usr/local/www/dhcp/count.txt", "w")
#	count1.write(count_serial += 1)
#	count.close
#	count1.close
#	
