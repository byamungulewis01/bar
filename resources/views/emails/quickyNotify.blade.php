@component('mail::message')
Dear Adv. <b>{{ $name }}</b>

Few months back the Rwanda Bar 
Association has been upgrading and 
relocating the hosting server of the 
Rwanda Bar Association Management
information system (RBA MIS) for
the purpose of strengthening system 
usability, accessibility and availability of
 the system.
In this regards we are happy to 
inform you that you will be accessing
the system using the new link.  To 
access the system click here
http://rbamis.rwandabar.rw/

Your user name is <b>{{ $email }}</b> <br>
Password: (“password”)

Kind regards<br>

@endcomponent
