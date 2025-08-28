<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Experience;
use Illuminate\Database\Seeder;

class PortfolioSeeder extends Seeder
{
    public function run(): void
    {
        // Sample Projects with Images
        Project::create([
            'title' => 'Kali Linux Penetration Testing Lab',
            'description' => 'Comprehensive penetration testing environment using Kali Linux for network reconnaissance, vulnerability assessment, and exploitation testing. Includes automated scanning with Nmap and manual testing with various security tools.',
            'screenshot' => 'images/sample-kali.svg',
            'tools_used' => ['Kali Linux', 'Nmap', 'Metasploit', 'Burp Suite', 'Wireshark'],
            'link' => 'https://github.com/example/kali-pentest-lab'
        ]);

        Project::create([
            'title' => 'Web Application Penetration Testing',
            'description' => 'Full-scope penetration test of e-commerce web application using Burp Suite Professional. Identified critical vulnerabilities including SQL injection, XSS, and insecure direct object references with detailed remediation recommendations.',
            'screenshot' => 'images/sample-webapp.svg',
            'tools_used' => ['Burp Suite', 'OWASP ZAP', 'SQLMap', 'Nikto', 'Gobuster'],
            'link' => 'https://github.com/example/webapp-pentest'
        ]);

        Project::create([
            'title' => 'SIEM Implementation & Monitoring',
            'description' => 'Deployed and configured Splunk SIEM solution for real-time security monitoring and incident response automation. Created custom dashboards for threat detection and implemented automated alerting for critical security events.',
            'screenshot' => 'images/sample-siem.svg',
            'tools_used' => ['Splunk', 'Syslog-ng', 'Python', 'PowerShell', 'ELK Stack'],
            'link' => 'https://github.com/example/siem-implementation'
        ]);

        Project::create([
            'title' => 'Network Vulnerability Assessment',
            'description' => 'Comprehensive vulnerability assessment of enterprise network infrastructure using automated scanning tools and manual testing techniques. Identified critical vulnerabilities and provided prioritized remediation roadmap.',
            'screenshot' => 'images/sample-vuln-assessment.svg',
            'tools_used' => ['Nmap', 'Nessus', 'OpenVAS', 'Metasploit', 'Masscan'],
            'link' => 'https://github.com/example/network-vuln-assessment'
        ]);

        // Sample Experiences
        Experience::create([
            'title' => 'Junior Cybersecurity Analyst',
            'company' => 'SecureTech Solutions',
            'type' => 'job',
            'description' => 'Monitored security events, conducted vulnerability assessments, and assisted in incident response activities.',
            'start_date' => '2023-01-15',
            'end_date' => null
        ]);

        Experience::create([
            'title' => 'Cybersecurity Intern',
            'company' => 'CyberGuard Corp',
            'type' => 'internship',
            'description' => 'Gained hands-on experience in penetration testing, security auditing, and threat analysis.',
            'start_date' => '2022-06-01',
            'end_date' => '2022-12-31'
        ]);

        Experience::create([
            'title' => 'CompTIA Security+',
            'company' => 'CompTIA',
            'type' => 'certification',
            'description' => 'Foundational cybersecurity certification covering network security, compliance, and operational security.',
            'start_date' => '2022-03-15',
            'end_date' => null
        ]);

        Experience::create([
            'title' => 'Certified Ethical Hacker (CEH)',
            'company' => 'EC-Council',
            'type' => 'certification',
            'description' => 'Advanced certification in ethical hacking techniques and penetration testing methodologies.',
            'start_date' => '2023-08-20',
            'end_date' => null
        ]);
    }
}
