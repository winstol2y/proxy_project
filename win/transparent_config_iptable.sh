#!/bin/bash

iptables -F
iptables -t nat -F
iptables -t mangle -F
iptables -t filter -F
iptables -X

iptables -A FORWARD -o eth1 -i eth0 -s 10.0.0.0/8 -m conntrack --ctstate NEW -j ACCEPT
iptables -A FORWARD -m conntrack --ctstate ESTABLISHED,RELATED -j ACCEPT
iptables -A POSTROUTING -t nat -j MASQUERADE
iptables -t nat -A PREROUTING -i eth0 -s 10.0.0.0/8 -p tcp --dport 80 -j REDIRECT --to-port 2520


#/etc/init.d/iptables save
#/etc/init.d/iptables restart
