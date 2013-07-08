Martin's fork of

moodle2google
=============
This program takes an iCalendar file generated by [moodle/moodle](https://github.com/moodle/moodle "moodle github link") and returns a better structured iCalendar file, optionally with undesired courses removed. Note, this is only tested on students attending the School of Information and Communication Technology ([SICT](http://www.sict.aau.dk/)) at Aalborg University, but will most likely work with any installation of moodle.

Online version at http://m2g.martinbmadsen.dk/.

The calendar returned from this parser is valid according to this iCalendar validator: http://severinghaus.org/projects/icv/

Usage
-------
Simply follow the two steps below.

* Apply your **username**, **moodle token**, and **moodle url** (to get these values, see below) in any order to the location where this program resides, like so (note: these credentials aren't valid):

http://m2g.martinbmadsen.dk?u=mbma11@student.aau.dk&token= e87d8abdd212e22cda3e53a687c5a6abdfd83db9&moodle=moodle=sict.moodle.aau.dk

This returns an .ics file with your moodle calendar, which Google Calendar, or any other calendar app, can parse. All you have to do is add the above url as one of your calendars, and it will seamlessly update as courses get added, moved, or removed by whoever administrates your moodle.

* If you wish to remove a course, you merely supply a comma-separated list of the course names (these will be the titles of the events in Google Calendar) like so:

http://m2g.martinbmadsen.dk?u=mbma11@student.aau.dk&token= e87d8abdd212e22cda3e53a687c5a6abdfd83db9&moodle=moodle=sict.moodle.aau.dk&remove=AD2,DEB2,SU(ENG)

And voilá, you're done!

Other information
-------
Here is how to get the needed parameters:
* **username** is simply the login you use to access moodle
* **authtoken** can be found by visiting whatever site hosts your installation of moodle, logging in, and clicking on the calendar. Then scroll down and click on "export calendar" followed by "show URL for this calendar", where you then can see the authtoken parameter in the generated url. This is the authtoken you use.
* **moodleurl** is simply the root address to the site hosting the moodle installation. Examples from Aalborg University are: http://ses.moodle.aau.dk, http://sict.moodle.aau.dk, http://sadp.moodle.aau.dk, and so on...

Also, adding ``?debug`` to the above url will set the Content-Type to ``text/plain`` instead of ``text/calendar`` so you can see the generated file before downloading it.

Running
-------
To get this running on your own server, you merely need to be running PHP 5.3+.

TODO
-------
If I ever get time...
- Keep a consistent calendar (moodle only keeps track of the previous and next 240 days)
- Add timezone information to the ics file (VTIMEZONE)

License
-------
Copyright (C) 2012 Niels Sonnich Poulsen (https://github.com/Acolarh)  
Copyright (C) 2012 Elias Obeid (https://github.com/Obeyed)  
Copyright (C) 2012 Sebastian Wahl (https://github.com/spillerrec)

Permission is hereby granted, free of charge, to any person
obtaining a copy of this software and associated documentation
files (the "Software"), to deal in the Software without
restriction, including without limitation the rights to use,
copy, modify, merge, publish, distribute, sublicense, and/or
sell copies of the Software, and to permit persons to whom the
Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be
included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT
HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY,
WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING
FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
OTHER DEALINGS IN THE SOFTWARE.
