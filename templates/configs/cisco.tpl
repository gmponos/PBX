{section name=i loop=$data}
phone_label: ""
line1_displayname: "{$data[i].extension}"
line1_shortname: "{$data[i].extension}"
line1_name: {$data[i].extension}
line1_authname: "{$data[i].extension}"
line1_password: "{$data[i].password}"
phone_prompt: "SIP Phone"
phone_password: "cisco"
user_info: none
{/section}
