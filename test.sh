#Enable ip_forwarding
echo "FORWARD_IPV4=ture" > "/etc/sysconfig/network"
sysctl -w net.ipv4.ip_forward=1
service network restart
echo "enable port_forwarding=1"

#Prepaid service iptables
service iptables restart
iptables -F

#Open port souce connect to Server (Destination) (INPUT)
#iptables -A INPUT -m state --state NEW -m tcp -p tcp --dport 80 -j ACCEPT
#iptables -A INPUT -m state --state NEW -m tcp -p tcp --dport 443 -j ACCEPT

#Open Lancard networking eth1
iptables -t nat -A POSTROUTING -o eth0 -j MASQUERADE
iptables -t nat -A POSTROUTING -o eth1 -j MASQUERADE

#Forward Souce INPUT to Destination OUTPUT Server 158.108.207.113
iptables -t nat -A PREROUTING -p tcp --dport 80 -j DNAT --to-destination 158.108.207.113:2520

#Forward Souce INPUT to Destination OUTPUT Server 158.108.207.113
iptables -t nat -A PREROUTING -p tcp --dport 443 -j DNAT --to-destination 158.108.207.113:2520

#iptables -A FORWARD -o eth0 -i eth1 -s 158.108.207.113/24 -m conntrack --ctstate NEW -j ACCEPT
#iptables -A FORWARD -m conntrack --ctstate ESTABLISHED,RELATED -j ACCEPT
#iptables -A POSTROUTING -t nat -j MASQUERADE
#iptables -t nat -I PREROUTING 1 -i eth1 -s 158.108.207.113 -p tcp -m tcp --dport 80 -J ACCEPT
#iptables -t nat -I PREROUTING 1 -i eth1 -s 158.108.207.113 -p tcp -m tcp --dport 443 -J ACCEPT

#Show allow premission
iptables -L -n

