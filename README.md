Martin's fork of

moodle2google
=============
This program takes an iCalendar file generated by [moodle/moodle](https://github.com/moodle/moodle "moodle github link") and returns a better structured iCalendar file, optionally with undesired courses removed. Note, this is only tested on students attending the School of Information and Communication Technology ([SICT](http://www.sict.aau.dk/)) at Aalborg University, but will most likely work with any installation of moodle.

Online version at http://m2g.martinbmadsen.dk/.

The calendar returned from this parser is valid according to this iCalendar validator:
* http://severinghaus.org/projects/icv/

Usage
-------
Simply follow the two steps below.

* Apply your **user ID**, **moodle token**, and **moodle url** (to get these values, see below) in any order to the location where this program resides, like so (note: these credentials aren't valid):

    * m2g.martinbmadsen.dk  
?u=8399
&token=e87d8abdd212e22cda3e53a687c5a6abdfd83db9  
&moodle=sict.moodle.aau.dk

    This returns an .ics file with your moodle calendar, which Google Calendar, or any other calendar app, can parse. All you have to do is add the above url as one of your calendars, and it will seamlessly update as courses get added, moved, or removed by whoever administrates your moodle.

* If you wish to **remove** a course or multiple courses, you merely supply a comma-separated list of the course names (these will be the titles of the events in Google Calendar) like so:
    * m2g.martinbmadsen.dk  
?u=8399
&token=e87d8abdd212e22cda3e53a687c5a6abdfd83db9  
&moodle=moodle.aau.dk  
&remove=AD2,DEB2

    In this case, two versions of AD and DEB were running at the same time, where I only was attending the first version. Hence I don't want the other scheduled lectures in those courses polluting my calendar and have now removed them from the stream.

And voilá, you're done!

Getting required parameters
-------
Getting the required parameters for moodle2google is non-trivial. Below is a guide on how to get them:

1. Log in to your insitution's moodle website and visit the calendar. For AAU's moodle, it's [moodle.aau.dk/calendar/view.php](https://www.moodle.aau.dk/calendar/view.php).
2. Scroll to the bottom of the page and right click on the orange __ical__ icon and copy the link address. An example of such a url is: https://www.moodle.aau.dk/calendar/export_execute.php?preset_what=all&preset_time=recentupcoming&userid=8399&authtoken=8c2dd7ca64ac78efc63242c2314e062736c12a0c.
3. The __moodle__ parameter is the root url, so in this case: [moodle.aau.dk](https://www.moodle.aau.dk). Your __userid__ and __authtoken__ are used as __u__ and __authtoken__ in moodle2google, respectively.

Other information
-------
Adding ``?debug=true`` to the above url will set the Content-Type to ``text/plain`` instead of ``text/calendar`` so you can see the generated file before downloading it.

Running
-------
To get this running on your own server, you merely need to be using PHP 5.3+.

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
