#!/usr/bin/ruby
require 'erb'
require 'mysql'
class Squid_block_header
        def initialize data_squid_block, data_port_header
                @data_squid_block = data_squid_block
		@data_port_header = data_port_header
	end
        def render path
                content = File.read(File.expand_path(path))
                t = ERB.new(content,nil,'%<>-')
                t.result(binding)
        end
end
#class Port_header
#	def initialize data_port_header
#		@data_port_header = data_port_header
#	end
#        def render path
#                content = File.read(File.expand_path(path))
#                t = ERB.new(content,nil,'%<>-')
#                t.result(binding)
#        end
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

	`rm /etc/squid3/squid.conf` # delete file squid.conf before create new file

	con = Mysql.new 'localhost', 'root', 'qwerty', 'block' # connect sql

####################################################### block url ########################################################

	data_port_header = con.query("SELECT * FROM `head_port`") # open and close port data
	data_squid_block = con.query("SELECT * FROM block_url") # url data

	insert_squid_block = Squid_block_header.new(data_squid_block,data_port_header) # insert data from query to class

	file_squid_block = File.open("/etc/squid3/squid.conf", 'w') # open file config
	file_squid_block.puts insert_squid_block.render("/var/www/html/oak2/template_squid_block.erb") # sent data to template 
	file_squid_block.close # close file config

##########################################################################################################################

