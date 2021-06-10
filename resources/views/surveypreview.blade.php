<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
      * {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
html,
body,
div,
span,
applet,
object,
iframe,
h1,
h2,
h3,
h4,
h5,
h6,
p,
blockquote,
pre,
a,
abbr,
acronym,
address,
big,
cite,
code,
del,
dfn,
em,
font,
img,
ins,
kbd,
q,
s,
samp,
small,
strike,
strong,
sub,
sup,
tt,
var,
dl,
dt,
dd,
ol,
ul,
li,
fieldset,
form,
label,
legend,
table,
caption,
tbody,
tfoot,
thead,
tr,
th,
td,
select,
input,
option {
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 100%;
}
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
nav,
section,
summary {
    display: block;
}
audio,
canvas,
video {
    display: inline-block;
}
audio:not([controls]) {
    display: none;
    height: 0;
}
pre {
    white-space: pre;
    white-space: pre-wrap;
    word-wrap: break-word;
}
q {
    quotes: none;
}
q:before,
q:after {
    content: "";
    content: none;
}
small {
    font-size: 80%;
}
sub,
sup {
    font-size: 75%;
    line-height: 0;
    position: relative;
    vertical-align: baseline;
}
sup {
    top: -0.5em;
}
sub {
    bottom: -0.25em;
}
nav ul,
nav ol {
    list-style: none;
    list-style-image: none;
}
button,
input,
select,
textarea {
    font-size: 100%;
    margin: 0;
    vertical-align: baseline;
}
textarea {
    overflow: auto;
    vertical-align: top;
}
table {
    border-collapse: collapse;
    border-spacing: 0;
}
button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
    -webkit-appearance: none;
    appearance: none;
    cursor: pointer;
}
/* remember to define focus styles! */
:focus {
    outline: 0;
}
ol,
ul {
    list-style: none;
}
/* tables still need 'cellspacing="0"' in the markup */
table {
    border-collapse: separate;
    border-spacing: 0;
}
caption,
th,
td {
    text-align: left;
    font-weight: normal;
}
a {
    text-decoration: none;
    outline: none;
    transition: all 200ms ease-in-out 0s;
    -moz-transition: all 200ms ease-in-out 0s;
    -webkit-transition: all 200ms ease-in-out 0s;
}
a:hover {
    color: #f8981d;
}
blockquote:before,
blockquote:after,
q:before,
q:after {
    content: "";
}
blockquote,
q {
    quotes: "" "";
}
table {
    border: 0 none;
    border-collapse: collapse;
    border-spacing: 0;
}
td {
    vertical-align: top;
}
img {
    border: 0 none;
    max-width: 100%;
}
/* End hide from IE Mac */
.none {
    display: none;
} /* End Clearfix */
article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
nav,
section {
    display: block;
}
.clear {
    clear: both;
}
/* For modern browsers */
.cf:before,
.cf:after {
    content: "";
    display: table;
}
.cf:after {
    clear: both;
}
/* For IE 6/7 (trigger hasLayout) */
/*----------intial declartaion of css end----------*/

/* font family start */
/* font family end */

/* base css start */

html {
    width: 100%;
    height: 100%;
}
body {
    min-height: 100%;
    margin: 0;
    padding: 0;
    font-family: "Roboto", sans-serif;
    font-weight: normal;
    font-size: 1em;
    line-height: 1.42857143;
    overflow-x: hidden;
    color: #000;
}
#wrapper {
    width: 100%;
    float: left;
    padding: 0 0 0 0;
    margin: 0 0 0 0;
}
.title {
    margin: 40px 0px;
    font-weight: 700;
    font-size: 26px;
    font-style: normal;
    text-decoration: none;
    color: #0046da;
    line-height: normal;
}
.connectthat-body label {
    font-size: 18px;
    margin-bottom: 20px;
    font-weight: bold;
}
.connectthat-body .form-control {
    font-size: 18px;
    margin-bottom: 40px;
}
.checkround {
    position: absolute;
    top: 10%;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #fff;
    border-style: solid;
    border-width: 2px;
    border-radius: 50%;
    border-color: #dddddd;
}
.radio input:checked ~ .checkround {
    background-color: #fff;
    border-color: #0046da;
}
.radio .checkround:after {
    width: 10px;
    height: 10px;
    top: 2px;
    left: 2px;
    border-radius: 50%;
    background: #0046da;
    content: "";
    position: absolute;
    display: none;
}
.radio input:checked ~ .checkround:after {
    display: block;
}
.radio {
    padding-left: 30px;
    margin-top: 0px !important;
    cursor: pointer;
}
input[type="radio"] {
    display: none;
}

.radio-lbl label {
    margin-bottom: 8px;
    font-weight: normal;
}
.connectthat-body textarea {
    max-width: 100%;
    width: 400px;
}
.done-btn {
    margin-bottom: 20px;
    background-color: #0046da;
    color: #fff;
    font-size: 15px;
    font-weight: 400;
    float: none !important;
    font-size: 15px;
    border: 1px solid transparent;
}
.btn.done-btn:active,
.btn.done-btn:hover,
.btn.done-btn:focus {
    color: #fff !important;
}
/*.header {
    background: #f65874;
    color: #fff;
    position: relative;
    width: 100%;
    z-index: 999;
}*/
.logo {
    margin: 5px 0px;
    width: 90px;
}
.connectthat-form {
    margin-top: 60px;
}
.mt-40 {
    margin-top: 40px;
}
@import url(https://fonts.googleapis.com/css?family=Nunito);

/*
 * Skin: Blue
 * ----------
 */

.skin-blue .main-header .navbar {
    background-color: #3c8dbc;
}

.skin-blue .main-header .navbar .nav > li > a {
    color: #ffffff;
}

.skin-blue .main-header .navbar .nav > li > a:hover,
.skin-blue .main-header .navbar .nav > li > a:active,
.skin-blue .main-header .navbar .nav > li > a:focus,
.skin-blue .main-header .navbar .nav .open > a,
.skin-blue .main-header .navbar .nav .open > a:hover,
.skin-blue .main-header .navbar .nav .open > a:focus,
.skin-blue .main-header .navbar .nav > .active > a {
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.skin-blue .main-header .navbar .sidebar-toggle {
    color: #ffffff;
}

.skin-blue .main-header .navbar .sidebar-toggle:hover {
    color: #f6f6f6;
    background: rgba(0, 0, 0, 0.1);
}

.skin-blue .main-header .navbar .sidebar-toggle {
    color: #fff;
}

.skin-blue .main-header .navbar .sidebar-toggle:hover {
    background-color: #367fa9;
}

@media (max-width: 767px) {
    .skin-blue .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .skin-blue .main-header .navbar .dropdown-menu li a {
        color: #fff;
    }

    .skin-blue .main-header .navbar .dropdown-menu li a:hover {
        background: #367fa9;
    }
}

.skin-blue .main-header .logo {
    background-color: #367fa9;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-blue .main-header .logo:hover {
    background-color: #357ca5;
}

.skin-blue .main-header li.user-header {
    background-color: #3c8dbc;
}

.skin-blue .content-header {
    background: transparent;
}

.skin-blue .wrapper,
.skin-blue .main-sidebar,
.skin-blue .left-side {
    background-color: #222d32;
}

.skin-blue .user-panel > .info,
.skin-blue .user-panel > .info > a {
    color: #fff;
}

.skin-blue .sidebar-menu > li.header {
    color: #4b646f;
    background: #1a2226;
}

.skin-blue .sidebar-menu > li > a {
    border-left: 3px solid transparent;
}

.skin-blue .sidebar-menu > li:hover > a,
.skin-blue .sidebar-menu > li.active > a,
.skin-blue .sidebar-menu > li.menu-open > a {
    color: #ffffff;
    background: #1e282c;
}

.skin-blue .sidebar-menu > li.active > a {
    border-left-color: #3c8dbc;
}

.skin-blue .sidebar-menu > li > .treeview-menu {
    margin: 0 1px;
    background: #2c3b41;
}

.skin-blue .sidebar a {
    color: #b8c7ce;
}

.skin-blue .sidebar a:hover {
    text-decoration: none;
}

.skin-blue .sidebar-menu .treeview-menu > li > a {
    color: #8aa4af;
}

.skin-blue .sidebar-menu .treeview-menu > li.active > a,
.skin-blue .sidebar-menu .treeview-menu > li > a:hover {
    color: #ffffff;
}

.skin-blue .sidebar-form {
    border-radius: 3px;
    border: 1px solid #374850;
    margin: 10px 10px;
}

.skin-blue .sidebar-form input[type="text"],
.skin-blue .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #374850;
    border: 1px solid transparent;
    height: 35px;
}

.skin-blue .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-blue .sidebar-form input[type="text"]:focus,
.skin-blue .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-blue .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-blue .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

.skin-blue.layout-top-nav .main-header > .logo {
    background-color: #3c8dbc;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-blue.layout-top-nav .main-header > .logo:hover {
    background-color: #3b8ab8;
}

/*
 * Skin: Blue
 * ----------
 */

.skin-blue-light .main-header .navbar {
    background-color: #3c8dbc;
}

.skin-blue-light .main-header .navbar .nav > li > a {
    color: #ffffff;
}

.skin-blue-light .main-header .navbar .nav > li > a:hover,
.skin-blue-light .main-header .navbar .nav > li > a:active,
.skin-blue-light .main-header .navbar .nav > li > a:focus,
.skin-blue-light .main-header .navbar .nav .open > a,
.skin-blue-light .main-header .navbar .nav .open > a:hover,
.skin-blue-light .main-header .navbar .nav .open > a:focus,
.skin-blue-light .main-header .navbar .nav > .active > a {
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.skin-blue-light .main-header .navbar .sidebar-toggle {
    color: #ffffff;
}

.skin-blue-light .main-header .navbar .sidebar-toggle:hover {
    color: #f6f6f6;
    background: rgba(0, 0, 0, 0.1);
}

.skin-blue-light .main-header .navbar .sidebar-toggle {
    color: #fff;
}

.skin-blue-light .main-header .navbar .sidebar-toggle:hover {
    background-color: #367fa9;
}

@media (max-width: 767px) {
    .skin-blue-light .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .skin-blue-light .main-header .navbar .dropdown-menu li a {
    color: #fff;
    }

    .skin-blue-light .main-header .navbar .dropdown-menu li a:hover {
        background: #367fa9;
    }
}

.skin-blue-light .main-header .logo {
    background-color: #3c8dbc;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-blue-light .main-header .logo:hover {
    background-color: #3b8ab8;
}

.skin-blue-light .main-header li.user-header {
    background-color: #3c8dbc;
}

.skin-blue-light .content-header {
    background: transparent;
}

.skin-blue-light .wrapper,
.skin-blue-light .main-sidebar,
.skin-blue-light .left-side {
    background-color: #f9fafc;
}

.skin-blue-light .main-sidebar {
    border-right: 1px solid #d2d6de;
}

.skin-blue-light .user-panel > .info,
.skin-blue-light .user-panel > .info > a {
    color: #444444;
}

.skin-blue-light .sidebar-menu > li {
    -webkit-transition: border-left-color 0.3s ease;
    transition: border-left-color 0.3s ease;
}

.skin-blue-light .sidebar-menu > li.header {
    color: #848484;
    background: #f9fafc;
}

.skin-blue-light .sidebar-menu > li > a {
    border-left: 3px solid transparent;
    font-weight: 600;
}

.skin-blue-light .sidebar-menu > li:hover > a,
.skin-blue-light .sidebar-menu > li.active > a {
    color: #000000;
    background: #f4f4f5;
}

.skin-blue-light .sidebar-menu > li.active {
    border-left-color: #3c8dbc;
}

.skin-blue-light .sidebar-menu > li.active > a {
    font-weight: 600;
}

.skin-blue-light .sidebar-menu > li > .treeview-menu {
    background: #f4f4f5;
}

.skin-blue-light .sidebar a {
    color: #444444;
}

.skin-blue-light .sidebar a:hover {
    text-decoration: none;
}

.skin-blue-light .sidebar-menu .treeview-menu > li > a {
    color: #777777;
}

.skin-blue-light .sidebar-menu .treeview-menu > li.active > a,
.skin-blue-light .sidebar-menu .treeview-menu > li > a:hover {
    color: #000000;
}

.skin-blue-light .sidebar-menu .treeview-menu > li.active > a {
    font-weight: 600;
}

.skin-blue-light .sidebar-form {
    border-radius: 3px;
    border: 1px solid #d2d6de;
    margin: 10px 10px;
}

.skin-blue-light .sidebar-form input[type="text"],
.skin-blue-light .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #fff;
    border: 1px solid transparent;
    height: 35px;
}

.skin-blue-light .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-blue-light .sidebar-form input[type="text"]:focus,
.skin-blue-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-blue-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-blue-light .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

@media (min-width: 768px) {
    .skin-blue-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {
        border-left: 1px solid #d2d6de;
    }
}

.skin-blue-light .main-footer {
    border-top-color: #d2d6de;
}

.skin-blue.layout-top-nav .main-header > .logo {
    background-color: #3c8dbc;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-blue.layout-top-nav .main-header > .logo:hover {
    background-color: #3b8ab8;
}

/*
 * Skin: Black
 * -----------
 */

/* skin-black navbar */

.skin-black .main-header {
    -webkit-box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.05);
}

.skin-black .main-header .navbar-toggle {
    color: #333;
}

.skin-black .main-header .navbar-brand {
    color: #333;
    border-right: 1px solid #eee;
}

.skin-black .main-header .navbar {
    background-color: #ffffff;
}

.skin-black .main-header .navbar .nav > li > a {
    color: #333333;
}

.skin-black .main-header .navbar .nav > li > a:hover,
.skin-black .main-header .navbar .nav > li > a:active,
.skin-black .main-header .navbar .nav > li > a:focus,
.skin-black .main-header .navbar .nav .open > a,
.skin-black .main-header .navbar .nav .open > a:hover,
.skin-black .main-header .navbar .nav .open > a:focus,
.skin-black .main-header .navbar .nav > .active > a {
    background: #ffffff;
    color: #999999;
}

.skin-black .main-header .navbar .sidebar-toggle {
    color: #333333;
}

.skin-black .main-header .navbar .sidebar-toggle:hover {
    color: #999999;
    background: #ffffff;
}

.skin-black .main-header .navbar > .sidebar-toggle {
    color: #333;
    border-right: 1px solid #eee;
}

.skin-black .main-header .navbar .navbar-nav > li > a {
    border-right: 1px solid #eee;
}

.skin-black .main-header .navbar .navbar-custom-menu .navbar-nav > li > a,
.skin-black .main-header .navbar .navbar-right > li > a {
    border-left: 1px solid #eee;
    border-right-width: 0;
}

.skin-black .main-header > .logo {
    background-color: #ffffff;
    color: #333333;
    border-bottom: 0 solid transparent;
    border-right: 1px solid #eee;
}

.skin-black .main-header > .logo:hover {
    background-color: #fcfcfc;
}

@media (max-width: 767px) {
    .skin-black .main-header > .logo {
        background-color: #222222;
        color: #ffffff;
        border-bottom: 0 solid transparent;
        border-right: none;
    }

    .skin-black .main-header > .logo:hover {
        background-color: #1f1f1f;
    }
}

.skin-black .main-header li.user-header {
    background-color: #222;
}

.skin-black .content-header {
    background: transparent;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.skin-black .wrapper,
.skin-black .main-sidebar,
.skin-black .left-side {
    background-color: #222d32;
}

.skin-black .user-panel > .info,
.skin-black .user-panel > .info > a {
    color: #fff;
}

.skin-black .sidebar-menu > li.header {
    color: #4b646f;
    background: #1a2226;
}

.skin-black .sidebar-menu > li > a {
    border-left: 3px solid transparent;
}

.skin-black .sidebar-menu > li:hover > a,
.skin-black .sidebar-menu > li.active > a,
.skin-black .sidebar-menu > li.menu-open > a {
    color: #ffffff;
    background: #1e282c;
}

.skin-black .sidebar-menu > li.active > a {
    border-left-color: #ffffff;
}

.skin-black .sidebar-menu > li > .treeview-menu {
    margin: 0 1px;
    background: #2c3b41;
}

.skin-black .sidebar a {
    color: #b8c7ce;
}

.skin-black .sidebar a:hover {
    text-decoration: none;
}

.skin-black .sidebar-menu .treeview-menu > li > a {
    color: #8aa4af;
}

.skin-black .sidebar-menu .treeview-menu > li.active > a,
.skin-black .sidebar-menu .treeview-menu > li > a:hover {
    color: #ffffff;
}

.skin-black .sidebar-form {
    border-radius: 3px;
    border: 1px solid #374850;
    margin: 10px 10px;
}

.skin-black .sidebar-form input[type="text"],
.skin-black .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #374850;
    border: 1px solid transparent;
    height: 35px;
}

.skin-black .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-black .sidebar-form input[type="text"]:focus,
.skin-black .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-black .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-black .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

.skin-black .pace .pace-progress {
    background: #222;
}

.skin-black .pace .pace-activity {
    border-top-color: #222;
    border-left-color: #222;
}

/*
 * Skin: Black
 * -----------
 */

/* skin-black navbar */

.skin-black-light .main-header {
    border-bottom: 1px solid #d2d6de;
}

.skin-black-light .main-header .navbar-toggle {
    color: #333;
}

.skin-black-light .main-header .navbar-brand {
    color: #333;
    border-right: 1px solid #d2d6de;
}

.skin-black-light .main-header .navbar {
    background-color: #ffffff;
}

.skin-black-light .main-header .navbar .nav > li > a {
    color: #333333;
}

.skin-black-light .main-header .navbar .nav > li > a:hover,
.skin-black-light .main-header .navbar .nav > li > a:active,
.skin-black-light .main-header .navbar .nav > li > a:focus,
.skin-black-light .main-header .navbar .nav .open > a,
.skin-black-light .main-header .navbar .nav .open > a:hover,
.skin-black-light .main-header .navbar .nav .open > a:focus,
.skin-black-light .main-header .navbar .nav > .active > a {
    background: #ffffff;
    color: #999999;
}

.skin-black-light .main-header .navbar .sidebar-toggle {
    color: #333333;
}

.skin-black-light .main-header .navbar .sidebar-toggle:hover {
    color: #999999;
    background: #ffffff;
}

.skin-black-light .main-header .navbar > .sidebar-toggle {
    color: #333;
    border-right: 1px solid #d2d6de;
}

.skin-black-light .main-header .navbar .navbar-nav > li > a {
    border-right: 1px solid #d2d6de;
}

.skin-black-light .main-header .navbar .navbar-custom-menu .navbar-nav > li > a,
.skin-black-light .main-header .navbar .navbar-right > li > a {
    border-left: 1px solid #d2d6de;
    border-right-width: 0;
}

.skin-black-light .main-header > .logo {
    background-color: #ffffff;
    color: #333333;
    border-bottom: 0 solid transparent;
    border-right: 1px solid #d2d6de;
}

.skin-black-light .main-header > .logo:hover {
    background-color: #fcfcfc;
}

@media (max-width: 767px) {
    .skin-black-light .main-header > .logo {
        background-color: #222222;
        color: #ffffff;
        border-bottom: 0 solid transparent;
        border-right: none;
    }

    .skin-black-light .main-header > .logo:hover {
        background-color: #1f1f1f;
    }
}

.skin-black-light .main-header li.user-header {
    background-color: #222;
}

.skin-black-light .content-header {
    background: transparent;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.skin-black-light .wrapper,
.skin-black-light .main-sidebar,
.skin-black-light .left-side {
    background-color: #f9fafc;
}

.skin-black-light .main-sidebar {
    border-right: 1px solid #d2d6de;
}

.skin-black-light .user-panel > .info,
.skin-black-light .user-panel > .info > a {
    color: #444444;
}

.skin-black-light .sidebar-menu > li {
    -webkit-transition: border-left-color 0.3s ease;
    transition: border-left-color 0.3s ease;
}

.skin-black-light .sidebar-menu > li.header {
    color: #848484;
    background: #f9fafc;
}

.skin-black-light .sidebar-menu > li > a {
    border-left: 3px solid transparent;
    font-weight: 600;
}

.skin-black-light .sidebar-menu > li:hover > a,
.skin-black-light .sidebar-menu > li.active > a {
    color: #000000;
    background: #f4f4f5;
}

.skin-black-light .sidebar-menu > li.active {
    border-left-color: #ffffff;
}

.skin-black-light .sidebar-menu > li.active > a {
    font-weight: 600;
}

.skin-black-light .sidebar-menu > li > .treeview-menu {
    background: #f4f4f5;
}

.skin-black-light .sidebar a {
    color: #444444;
}

.skin-black-light .sidebar a:hover {
    text-decoration: none;
}

.skin-black-light .sidebar-menu .treeview-menu > li > a {
    color: #777777;
}

.skin-black-light .sidebar-menu .treeview-menu > li.active > a,
.skin-black-light .sidebar-menu .treeview-menu > li > a:hover {
    color: #000000;
}

.skin-black-light .sidebar-menu .treeview-menu > li.active > a {
    font-weight: 600;
}

.skin-black-light .sidebar-form {
    border-radius: 3px;
    border: 1px solid #d2d6de;
    margin: 10px 10px;
}

.skin-black-light .sidebar-form input[type="text"],
.skin-black-light .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #fff;
    border: 1px solid transparent;
    height: 35px;
}

.skin-black-light .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-black-light .sidebar-form input[type="text"]:focus,
.skin-black-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-black-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-black-light .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

@media (min-width: 768px) {
    .skin-black-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {
        border-left: 1px solid #d2d6de;
    }
}

/*
 * Skin: Green
 * -----------
 */

.skin-green .main-header .navbar {
    background-color: #00a65a;
}

.skin-green .main-header .navbar .nav > li > a {
    color: #ffffff;
}

.skin-green .main-header .navbar .nav > li > a:hover,
.skin-green .main-header .navbar .nav > li > a:active,
.skin-green .main-header .navbar .nav > li > a:focus,
.skin-green .main-header .navbar .nav .open > a,
.skin-green .main-header .navbar .nav .open > a:hover,
.skin-green .main-header .navbar .nav .open > a:focus,
.skin-green .main-header .navbar .nav > .active > a {
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.skin-green .main-header .navbar .sidebar-toggle {
    color: #ffffff;
}

.skin-green .main-header .navbar .sidebar-toggle:hover {
    color: #f6f6f6;
    background: rgba(0, 0, 0, 0.1);
}

.skin-green .main-header .navbar .sidebar-toggle {
    color: #fff;
}

.skin-green .main-header .navbar .sidebar-toggle:hover {
    background-color: #008d4c;
}

@media (max-width: 767px) {
    .skin-green .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .skin-green .main-header .navbar .dropdown-menu li a {
    color: #fff;
    }

    .skin-green .main-header .navbar .dropdown-menu li a:hover {
        background: #008d4c;
    }
}

.skin-green .main-header .logo {
    background-color: #008d4c;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-green .main-header .logo:hover {
    background-color: #008749;
}

.skin-green .main-header li.user-header {
    background-color: #00a65a;
}

.skin-green .content-header {
    background: transparent;
}

.skin-green .wrapper,
.skin-green .main-sidebar,
.skin-green .left-side {
    background-color: #222d32;
}

.skin-green .user-panel > .info,
.skin-green .user-panel > .info > a {
    color: #fff;
}

.skin-green .sidebar-menu > li.header {
    color: #4b646f;
    background: #1a2226;
}

.skin-green .sidebar-menu > li > a {
    border-left: 3px solid transparent;
}

.skin-green .sidebar-menu > li:hover > a,
.skin-green .sidebar-menu > li.active > a,
.skin-green .sidebar-menu > li.menu-open > a {
    color: #ffffff;
    background: #1e282c;
}

.skin-green .sidebar-menu > li.active > a {
    border-left-color: #00a65a;
}

.skin-green .sidebar-menu > li > .treeview-menu {
    margin: 0 1px;
    background: #2c3b41;
}

.skin-green .sidebar a {
    color: #b8c7ce;
}

.skin-green .sidebar a:hover {
    text-decoration: none;
}

.skin-green .sidebar-menu .treeview-menu > li > a {
    color: #8aa4af;
}

.skin-green .sidebar-menu .treeview-menu > li.active > a,
.skin-green .sidebar-menu .treeview-menu > li > a:hover {
    color: #ffffff;
}

.skin-green .sidebar-form {
    border-radius: 3px;
    border: 1px solid #374850;
    margin: 10px 10px;
}

.skin-green .sidebar-form input[type="text"],
.skin-green .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #374850;
    border: 1px solid transparent;
    height: 35px;
}

.skin-green .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-green .sidebar-form input[type="text"]:focus,
.skin-green .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-green .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-green .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

/*
 * Skin: Green
 * -----------
 */

.skin-green-light .main-header .navbar {
    background-color: #00a65a;
}

.skin-green-light .main-header .navbar .nav > li > a {
    color: #ffffff;
}

.skin-green-light .main-header .navbar .nav > li > a:hover,
.skin-green-light .main-header .navbar .nav > li > a:active,
.skin-green-light .main-header .navbar .nav > li > a:focus,
.skin-green-light .main-header .navbar .nav .open > a,
.skin-green-light .main-header .navbar .nav .open > a:hover,
.skin-green-light .main-header .navbar .nav .open > a:focus,
.skin-green-light .main-header .navbar .nav > .active > a {
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.skin-green-light .main-header .navbar .sidebar-toggle {
    color: #ffffff;
}

.skin-green-light .main-header .navbar .sidebar-toggle:hover {
    color: #f6f6f6;
    background: rgba(0, 0, 0, 0.1);
}

.skin-green-light .main-header .navbar .sidebar-toggle {
    color: #fff;
}

.skin-green-light .main-header .navbar .sidebar-toggle:hover {
    background-color: #008d4c;
}

@media (max-width: 767px) {
    .skin-green-light .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .skin-green-light .main-header .navbar .dropdown-menu li a {
    color: #fff;
    }

    .skin-green-light .main-header .navbar .dropdown-menu li a:hover {
        background: #008d4c;
    }
}

.skin-green-light .main-header .logo {
    background-color: #00a65a;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-green-light .main-header .logo:hover {
    background-color: #00a157;
}

.skin-green-light .main-header li.user-header {
    background-color: #00a65a;
}

.skin-green-light .content-header {
    background: transparent;
}

.skin-green-light .wrapper,
.skin-green-light .main-sidebar,
.skin-green-light .left-side {
    background-color: #f9fafc;
}

.skin-green-light .main-sidebar {
    border-right: 1px solid #d2d6de;
}

.skin-green-light .user-panel > .info,
.skin-green-light .user-panel > .info > a {
    color: #444444;
}

.skin-green-light .sidebar-menu > li {
    -webkit-transition: border-left-color 0.3s ease;
    transition: border-left-color 0.3s ease;
}

.skin-green-light .sidebar-menu > li.header {
    color: #848484;
    background: #f9fafc;
}

.skin-green-light .sidebar-menu > li > a {
    border-left: 3px solid transparent;
    font-weight: 600;
}

.skin-green-light .sidebar-menu > li:hover > a,
.skin-green-light .sidebar-menu > li.active > a {
    color: #000000;
    background: #f4f4f5;
}

.skin-green-light .sidebar-menu > li.active {
    border-left-color: #00a65a;
}

.skin-green-light .sidebar-menu > li.active > a {
    font-weight: 600;
}

.skin-green-light .sidebar-menu > li > .treeview-menu {
    background: #f4f4f5;
}

.skin-green-light .sidebar a {
    color: #444444;
}

.skin-green-light .sidebar a:hover {
    text-decoration: none;
}

.skin-green-light .sidebar-menu .treeview-menu > li > a {
    color: #777777;
}

.skin-green-light .sidebar-menu .treeview-menu > li.active > a,
.skin-green-light .sidebar-menu .treeview-menu > li > a:hover {
    color: #000000;
}

.skin-green-light .sidebar-menu .treeview-menu > li.active > a {
    font-weight: 600;
}

.skin-green-light .sidebar-form {
    border-radius: 3px;
    border: 1px solid #d2d6de;
    margin: 10px 10px;
}

.skin-green-light .sidebar-form input[type="text"],
.skin-green-light .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #fff;
    border: 1px solid transparent;
    height: 35px;
}

.skin-green-light .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-green-light .sidebar-form input[type="text"]:focus,
.skin-green-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-green-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-green-light .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

@media (min-width: 768px) {
    .skin-green-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {
        border-left: 1px solid #d2d6de;
    }
}

/*
 * Skin: Red
 * ---------
 */

.skin-red .main-header .navbar {
    background-color: #dd4b39;
}

.skin-red .main-header .navbar .nav > li > a {
    color: #ffffff;
}

.skin-red .main-header .navbar .nav > li > a:hover,
.skin-red .main-header .navbar .nav > li > a:active,
.skin-red .main-header .navbar .nav > li > a:focus,
.skin-red .main-header .navbar .nav .open > a,
.skin-red .main-header .navbar .nav .open > a:hover,
.skin-red .main-header .navbar .nav .open > a:focus,
.skin-red .main-header .navbar .nav > .active > a {
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.skin-red .main-header .navbar .sidebar-toggle {
    color: #ffffff;
}

.skin-red .main-header .navbar .sidebar-toggle:hover {
    color: #f6f6f6;
    background: rgba(0, 0, 0, 0.1);
}

.skin-red .main-header .navbar .sidebar-toggle {
    color: #fff;
}

.skin-red .main-header .navbar .sidebar-toggle:hover {
    background-color: #d73925;
}

@media (max-width: 767px) {
    .skin-red .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .skin-red .main-header .navbar .dropdown-menu li a {
    color: #fff;
    }

    .skin-red .main-header .navbar .dropdown-menu li a:hover {
        background: #d73925;
    }
}

.skin-red .main-header .logo {
    background-color: #d73925;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-red .main-header .logo:hover {
    background-color: #d33724;
}

.skin-red .main-header li.user-header {
    background-color: #dd4b39;
}

.skin-red .content-header {
    background: transparent;
}

.skin-red .wrapper,
.skin-red .main-sidebar,
.skin-red .left-side {
    background-color: #222d32;
}

.skin-red .user-panel > .info,
.skin-red .user-panel > .info > a {
    color: #fff;
}

.skin-red .sidebar-menu > li.header {
    color: #4b646f;
    background: #1a2226;
}

.skin-red .sidebar-menu > li > a {
    border-left: 3px solid transparent;
}

.skin-red .sidebar-menu > li:hover > a,
.skin-red .sidebar-menu > li.active > a,
.skin-red .sidebar-menu > li.menu-open > a {
    color: #ffffff;
    background: #1e282c;
}

.skin-red .sidebar-menu > li.active > a {
    border-left-color: #dd4b39;
}

.skin-red .sidebar-menu > li > .treeview-menu {
    margin: 0 1px;
    background: #2c3b41;
}

.skin-red .sidebar a {
    color: #b8c7ce;
}

.skin-red .sidebar a:hover {
    text-decoration: none;
}

.skin-red .sidebar-menu .treeview-menu > li > a {
    color: #8aa4af;
}

.skin-red .sidebar-menu .treeview-menu > li.active > a,
.skin-red .sidebar-menu .treeview-menu > li > a:hover {
    color: #ffffff;
}

.skin-red .sidebar-form {
    border-radius: 3px;
    border: 1px solid #374850;
    margin: 10px 10px;
}

.skin-red .sidebar-form input[type="text"],
.skin-red .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #374850;
    border: 1px solid transparent;
    height: 35px;
}

.skin-red .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-red .sidebar-form input[type="text"]:focus,
.skin-red .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-red .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-red .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

/*
 * Skin: Red
 * ---------
 */

.skin-red-light .main-header .navbar {
    background-color: #dd4b39;
}

.skin-red-light .main-header .navbar .nav > li > a {
    color: #ffffff;
}

.skin-red-light .main-header .navbar .nav > li > a:hover,
.skin-red-light .main-header .navbar .nav > li > a:active,
.skin-red-light .main-header .navbar .nav > li > a:focus,
.skin-red-light .main-header .navbar .nav .open > a,
.skin-red-light .main-header .navbar .nav .open > a:hover,
.skin-red-light .main-header .navbar .nav .open > a:focus,
.skin-red-light .main-header .navbar .nav > .active > a {
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.skin-red-light .main-header .navbar .sidebar-toggle {
    color: #ffffff;
}

.skin-red-light .main-header .navbar .sidebar-toggle:hover {
    color: #f6f6f6;
    background: rgba(0, 0, 0, 0.1);
}

.skin-red-light .main-header .navbar .sidebar-toggle {
    color: #fff;
}

.skin-red-light .main-header .navbar .sidebar-toggle:hover {
    background-color: #d73925;
}

@media (max-width: 767px) {
    .skin-red-light .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .skin-red-light .main-header .navbar .dropdown-menu li a {
    color: #fff;
    }

    .skin-red-light .main-header .navbar .dropdown-menu li a:hover {
        background: #d73925;
    }
}

.skin-red-light .main-header .logo {
    background-color: #dd4b39;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-red-light .main-header .logo:hover {
    background-color: #dc4735;
}

.skin-red-light .main-header li.user-header {
    background-color: #dd4b39;
}

.skin-red-light .content-header {
    background: transparent;
}

.skin-red-light .wrapper,
.skin-red-light .main-sidebar,
.skin-red-light .left-side {
    background-color: #f9fafc;
}

.skin-red-light .main-sidebar {
    border-right: 1px solid #d2d6de;
}

.skin-red-light .user-panel > .info,
.skin-red-light .user-panel > .info > a {
    color: #444444;
}

.skin-red-light .sidebar-menu > li {
    -webkit-transition: border-left-color 0.3s ease;
    transition: border-left-color 0.3s ease;
}

.skin-red-light .sidebar-menu > li.header {
    color: #848484;
    background: #f9fafc;
}

.skin-red-light .sidebar-menu > li > a {
    border-left: 3px solid transparent;
    font-weight: 600;
}

.skin-red-light .sidebar-menu > li:hover > a,
.skin-red-light .sidebar-menu > li.active > a {
    color: #000000;
    background: #f4f4f5;
}

.skin-red-light .sidebar-menu > li.active {
    border-left-color: #dd4b39;
}

.skin-red-light .sidebar-menu > li.active > a {
    font-weight: 600;
}

.skin-red-light .sidebar-menu > li > .treeview-menu {
    background: #f4f4f5;
}

.skin-red-light .sidebar a {
    color: #444444;
}

.skin-red-light .sidebar a:hover {
    text-decoration: none;
}

.skin-red-light .sidebar-menu .treeview-menu > li > a {
    color: #777777;
}

.skin-red-light .sidebar-menu .treeview-menu > li.active > a,
.skin-red-light .sidebar-menu .treeview-menu > li > a:hover {
    color: #000000;
}

.skin-red-light .sidebar-menu .treeview-menu > li.active > a {
    font-weight: 600;
}

.skin-red-light .sidebar-form {
    border-radius: 3px;
    border: 1px solid #d2d6de;
    margin: 10px 10px;
}

.skin-red-light .sidebar-form input[type="text"],
.skin-red-light .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #fff;
    border: 1px solid transparent;
    height: 35px;
}

.skin-red-light .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-red-light .sidebar-form input[type="text"]:focus,
.skin-red-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-red-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-red-light .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

@media (min-width: 768px) {
    .skin-red-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {
        border-left: 1px solid #d2d6de;
    }
}

/*
 * Skin: Yellow
 * ------------
 */

.skin-yellow .main-header .navbar {
    background-color: #f39c12;
}

.skin-yellow .main-header .navbar .nav > li > a {
    color: #ffffff;
}

.skin-yellow .main-header .navbar .nav > li > a:hover,
.skin-yellow .main-header .navbar .nav > li > a:active,
.skin-yellow .main-header .navbar .nav > li > a:focus,
.skin-yellow .main-header .navbar .nav .open > a,
.skin-yellow .main-header .navbar .nav .open > a:hover,
.skin-yellow .main-header .navbar .nav .open > a:focus,
.skin-yellow .main-header .navbar .nav > .active > a {
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.skin-yellow .main-header .navbar .sidebar-toggle {
    color: #ffffff;
}

.skin-yellow .main-header .navbar .sidebar-toggle:hover {
    color: #f6f6f6;
    background: rgba(0, 0, 0, 0.1);
}

.skin-yellow .main-header .navbar .sidebar-toggle {
    color: #fff;
}

.skin-yellow .main-header .navbar .sidebar-toggle:hover {
    background-color: #e08e0b;
}

@media (max-width: 767px) {
    .skin-yellow .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .skin-yellow .main-header .navbar .dropdown-menu li a {
    color: #fff;
    }

    .skin-yellow .main-header .navbar .dropdown-menu li a:hover {
        background: #e08e0b;
    }
}

.skin-yellow .main-header .logo {
    background-color: #e08e0b;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-yellow .main-header .logo:hover {
    background-color: #db8b0b;
}

.skin-yellow .main-header li.user-header {
    background-color: #f39c12;
}

.skin-yellow .content-header {
    background: transparent;
}

.skin-yellow .wrapper,
.skin-yellow .main-sidebar,
.skin-yellow .left-side {
    background-color: #222d32;
}

.skin-yellow .user-panel > .info,
.skin-yellow .user-panel > .info > a {
    color: #fff;
}

.skin-yellow .sidebar-menu > li.header {
    color: #4b646f;
    background: #1a2226;
}

.skin-yellow .sidebar-menu > li > a {
    border-left: 3px solid transparent;
}

.skin-yellow .sidebar-menu > li:hover > a,
.skin-yellow .sidebar-menu > li.active > a,
.skin-yellow .sidebar-menu > li.menu-open > a {
    color: #ffffff;
    background: #1e282c;
}

.skin-yellow .sidebar-menu > li.active > a {
    border-left-color: #f39c12;
}

.skin-yellow .sidebar-menu > li > .treeview-menu {
    margin: 0 1px;
    background: #2c3b41;
}

.skin-yellow .sidebar a {
    color: #b8c7ce;
}

.skin-yellow .sidebar a:hover {
    text-decoration: none;
}

.skin-yellow .sidebar-menu .treeview-menu > li > a {
    color: #8aa4af;
}

.skin-yellow .sidebar-menu .treeview-menu > li.active > a,
.skin-yellow .sidebar-menu .treeview-menu > li > a:hover {
    color: #ffffff;
}

.skin-yellow .sidebar-form {
    border-radius: 3px;
    border: 1px solid #374850;
    margin: 10px 10px;
}

.skin-yellow .sidebar-form input[type="text"],
.skin-yellow .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #374850;
    border: 1px solid transparent;
    height: 35px;
}

.skin-yellow .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-yellow .sidebar-form input[type="text"]:focus,
.skin-yellow .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-yellow .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-yellow .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

/*
 * Skin: Yellow
 * ------------
 */

.skin-yellow-light .main-header .navbar {
    background-color: #f39c12;
}

.skin-yellow-light .main-header .navbar .nav > li > a {
    color: #ffffff;
}

.skin-yellow-light .main-header .navbar .nav > li > a:hover,
.skin-yellow-light .main-header .navbar .nav > li > a:active,
.skin-yellow-light .main-header .navbar .nav > li > a:focus,
.skin-yellow-light .main-header .navbar .nav .open > a,
.skin-yellow-light .main-header .navbar .nav .open > a:hover,
.skin-yellow-light .main-header .navbar .nav .open > a:focus,
.skin-yellow-light .main-header .navbar .nav > .active > a {
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.skin-yellow-light .main-header .navbar .sidebar-toggle {
    color: #ffffff;
}

.skin-yellow-light .main-header .navbar .sidebar-toggle:hover {
    color: #f6f6f6;
    background: rgba(0, 0, 0, 0.1);
}

.skin-yellow-light .main-header .navbar .sidebar-toggle {
    color: #fff;
}

.skin-yellow-light .main-header .navbar .sidebar-toggle:hover {
    background-color: #e08e0b;
}

@media (max-width: 767px) {
    .skin-yellow-light .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .skin-yellow-light .main-header .navbar .dropdown-menu li a {
    color: #fff;
    }

    .skin-yellow-light .main-header .navbar .dropdown-menu li a:hover {
        background: #e08e0b;
    }
}

.skin-yellow-light .main-header .logo {
    background-color: #f39c12;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-yellow-light .main-header .logo:hover {
    background-color: #f39a0d;
}

.skin-yellow-light .main-header li.user-header {
    background-color: #f39c12;
}

.skin-yellow-light .content-header {
    background: transparent;
}

.skin-yellow-light .wrapper,
.skin-yellow-light .main-sidebar,
.skin-yellow-light .left-side {
    background-color: #f9fafc;
}

.skin-yellow-light .main-sidebar {
    border-right: 1px solid #d2d6de;
}

.skin-yellow-light .user-panel > .info,
.skin-yellow-light .user-panel > .info > a {
    color: #444444;
}

.skin-yellow-light .sidebar-menu > li {
    -webkit-transition: border-left-color 0.3s ease;
    transition: border-left-color 0.3s ease;
}

.skin-yellow-light .sidebar-menu > li.header {
    color: #848484;
    background: #f9fafc;
}

.skin-yellow-light .sidebar-menu > li > a {
    border-left: 3px solid transparent;
    font-weight: 600;
}

.skin-yellow-light .sidebar-menu > li:hover > a,
.skin-yellow-light .sidebar-menu > li.active > a {
    color: #000000;
    background: #f4f4f5;
}

.skin-yellow-light .sidebar-menu > li.active {
    border-left-color: #f39c12;
}

.skin-yellow-light .sidebar-menu > li.active > a {
    font-weight: 600;
}

.skin-yellow-light .sidebar-menu > li > .treeview-menu {
    background: #f4f4f5;
}

.skin-yellow-light .sidebar a {
    color: #444444;
}

.skin-yellow-light .sidebar a:hover {
    text-decoration: none;
}

.skin-yellow-light .sidebar-menu .treeview-menu > li > a {
    color: #777777;
}

.skin-yellow-light .sidebar-menu .treeview-menu > li.active > a,
.skin-yellow-light .sidebar-menu .treeview-menu > li > a:hover {
    color: #000000;
}

.skin-yellow-light .sidebar-menu .treeview-menu > li.active > a {
    font-weight: 600;
}

.skin-yellow-light .sidebar-form {
    border-radius: 3px;
    border: 1px solid #d2d6de;
    margin: 10px 10px;
}

.skin-yellow-light .sidebar-form input[type="text"],
.skin-yellow-light .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #fff;
    border: 1px solid transparent;
    height: 35px;
}

.skin-yellow-light .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-yellow-light .sidebar-form input[type="text"]:focus,
.skin-yellow-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-yellow-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-yellow-light .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

@media (min-width: 768px) {
    .skin-yellow-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {
        border-left: 1px solid #d2d6de;
    }
}

/*
 * Skin: Purple
 * ------------
 */

.skin-purple .main-header .navbar {
    background-color: #605ca8;
}

.skin-purple .main-header .navbar .nav > li > a {
    color: #ffffff;
}

.skin-purple .main-header .navbar .nav > li > a:hover,
.skin-purple .main-header .navbar .nav > li > a:active,
.skin-purple .main-header .navbar .nav > li > a:focus,
.skin-purple .main-header .navbar .nav .open > a,
.skin-purple .main-header .navbar .nav .open > a:hover,
.skin-purple .main-header .navbar .nav .open > a:focus,
.skin-purple .main-header .navbar .nav > .active > a {
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.skin-purple .main-header .navbar .sidebar-toggle {
    color: #ffffff;
}

.skin-purple .main-header .navbar .sidebar-toggle:hover {
    color: #f6f6f6;
    background: rgba(0, 0, 0, 0.1);
}

.skin-purple .main-header .navbar .sidebar-toggle {
    color: #fff;
}

.skin-purple .main-header .navbar .sidebar-toggle:hover {
    background-color: #555299;
}

@media (max-width: 767px) {
    .skin-purple .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .skin-purple .main-header .navbar .dropdown-menu li a {
    color: #fff;
    }

    .skin-purple .main-header .navbar .dropdown-menu li a:hover {
        background: #555299;
    }
}

.skin-purple .main-header .logo {
    background-color: #555299;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-purple .main-header .logo:hover {
    background-color: #545096;
}

.skin-purple .main-header li.user-header {
    background-color: #605ca8;
}

.skin-purple .content-header {
    background: transparent;
}

.skin-purple .wrapper,
.skin-purple .main-sidebar,
.skin-purple .left-side {
    background-color: #222d32;
}

.skin-purple .user-panel > .info,
.skin-purple .user-panel > .info > a {
    color: #fff;
}

.skin-purple .sidebar-menu > li.header {
    color: #4b646f;
    background: #1a2226;
}

.skin-purple .sidebar-menu > li > a {
    border-left: 3px solid transparent;
}

.skin-purple .sidebar-menu > li:hover > a,
.skin-purple .sidebar-menu > li.active > a,
.skin-purple .sidebar-menu > li.menu-open > a {
    color: #ffffff;
    background: #1e282c;
}

.skin-purple .sidebar-menu > li.active > a {
    border-left-color: #605ca8;
}

.skin-purple .sidebar-menu > li > .treeview-menu {
    margin: 0 1px;
    background: #2c3b41;
}

.skin-purple .sidebar a {
    color: #b8c7ce;
}

.skin-purple .sidebar a:hover {
    text-decoration: none;
}

.skin-purple .sidebar-menu .treeview-menu > li > a {
    color: #8aa4af;
}

.skin-purple .sidebar-menu .treeview-menu > li.active > a,
.skin-purple .sidebar-menu .treeview-menu > li > a:hover {
    color: #ffffff;
}

.skin-purple .sidebar-form {
    border-radius: 3px;
    border: 1px solid #374850;
    margin: 10px 10px;
}

.skin-purple .sidebar-form input[type="text"],
.skin-purple .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #374850;
    border: 1px solid transparent;
    height: 35px;
}

.skin-purple .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-purple .sidebar-form input[type="text"]:focus,
.skin-purple .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-purple .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-purple .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

/*
 * Skin: Purple
 * ------------
 */

.skin-purple-light .main-header .navbar {
    background-color: #605ca8;
}

.skin-purple-light .main-header .navbar .nav > li > a {
    color: #ffffff;
}

.skin-purple-light .main-header .navbar .nav > li > a:hover,
.skin-purple-light .main-header .navbar .nav > li > a:active,
.skin-purple-light .main-header .navbar .nav > li > a:focus,
.skin-purple-light .main-header .navbar .nav .open > a,
.skin-purple-light .main-header .navbar .nav .open > a:hover,
.skin-purple-light .main-header .navbar .nav .open > a:focus,
.skin-purple-light .main-header .navbar .nav > .active > a {
    background: rgba(0, 0, 0, 0.1);
    color: #f6f6f6;
}

.skin-purple-light .main-header .navbar .sidebar-toggle {
    color: #ffffff;
}

.skin-purple-light .main-header .navbar .sidebar-toggle:hover {
    color: #f6f6f6;
    background: rgba(0, 0, 0, 0.1);
}

.skin-purple-light .main-header .navbar .sidebar-toggle {
    color: #fff;
}

.skin-purple-light .main-header .navbar .sidebar-toggle:hover {
    background-color: #555299;
}

@media (max-width: 767px) {
    .skin-purple-light .main-header .navbar .dropdown-menu li.divider {
        background-color: rgba(255, 255, 255, 0.1);
    }

    .skin-purple-light .main-header .navbar .dropdown-menu li a {
    color: #fff;
    }

    .skin-purple-light .main-header .navbar .dropdown-menu li a:hover {
        background: #555299;
    }
}

.skin-purple-light .main-header .logo {
    background-color: #605ca8;
    color: #ffffff;
    border-bottom: 0 solid transparent;
}

.skin-purple-light .main-header .logo:hover {
    background-color: #5d59a6;
}

.skin-purple-light .main-header li.user-header {
    background-color: #605ca8;
}

.skin-purple-light .content-header {
    background: transparent;
}

.skin-purple-light .wrapper,
.skin-purple-light .main-sidebar,
.skin-purple-light .left-side {
    background-color: #f9fafc;
}

.skin-purple-light .main-sidebar {
    border-right: 1px solid #d2d6de;
}

.skin-purple-light .user-panel > .info,
.skin-purple-light .user-panel > .info > a {
    color: #444444;
}

.skin-purple-light .sidebar-menu > li {
    -webkit-transition: border-left-color 0.3s ease;
    transition: border-left-color 0.3s ease;
}

.skin-purple-light .sidebar-menu > li.header {
    color: #848484;
    background: #f9fafc;
}

.skin-purple-light .sidebar-menu > li > a {
    border-left: 3px solid transparent;
    font-weight: 600;
}

.skin-purple-light .sidebar-menu > li:hover > a,
.skin-purple-light .sidebar-menu > li.active > a {
    color: #000000;
    background: #f4f4f5;
}

.skin-purple-light .sidebar-menu > li.active {
    border-left-color: #605ca8;
}

.skin-purple-light .sidebar-menu > li.active > a {
    font-weight: 600;
}

.skin-purple-light .sidebar-menu > li > .treeview-menu {
    background: #f4f4f5;
}

.skin-purple-light .sidebar a {
    color: #444444;
}

.skin-purple-light .sidebar a:hover {
    text-decoration: none;
}

.skin-purple-light .sidebar-menu .treeview-menu > li > a {
    color: #777777;
}

.skin-purple-light .sidebar-menu .treeview-menu > li.active > a,
.skin-purple-light .sidebar-menu .treeview-menu > li > a:hover {
    color: #000000;
}

.skin-purple-light .sidebar-menu .treeview-menu > li.active > a {
    font-weight: 600;
}

.skin-purple-light .sidebar-form {
    border-radius: 3px;
    border: 1px solid #d2d6de;
    margin: 10px 10px;
}

.skin-purple-light .sidebar-form input[type="text"],
.skin-purple-light .sidebar-form .btn {
    -webkit-box-shadow: none;
    box-shadow: none;
    background-color: #fff;
    border: 1px solid transparent;
    height: 35px;
}

.skin-purple-light .sidebar-form input[type="text"] {
    color: #666;
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
}

.skin-purple-light .sidebar-form input[type="text"]:focus,
.skin-purple-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    background-color: #fff;
    color: #666;
}

.skin-purple-light .sidebar-form input[type="text"]:focus + .input-group-btn .btn {
    border-left-color: #fff;
}

.skin-purple-light .sidebar-form .btn {
    color: #999;
    border-top-left-radius: 0;
    border-top-right-radius: 2px;
    border-bottom-right-radius: 2px;
    border-bottom-left-radius: 0;
}

@media (min-width: 768px) {
    .skin-purple-light.sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {
        border-left: 1px solid #d2d6de;
    }
}

/*!
 *   AdminLTE v2.4.5
 *   Author: Almsaeed Studio
 *   Website: Almsaeed Studio <https://adminlte.io>
 *   License: Open source - MIT
 *           Please visit http://opensource.org/licenses/MIT for more information
 */

/*
 * Core: General Layout Style
 * -------------------------
 */

html,
body {
    height: 100%;
}

.layout-boxed html,
.layout-boxed body {
    height: 100%;
}

body {
    font-family: 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif;
    font-weight: 400;
    overflow-x: hidden;
    overflow-y: auto;
}

/* Layout */

.wrapper {
    height: 100%;
    position: relative;
    overflow-x: hidden;
    overflow-y: auto;
}

.wrapper:before,
.wrapper:after {
    content: " ";
    display: table;
}

.wrapper:after {
    clear: both;
}

.layout-boxed .wrapper {
    max-width: 1250px;
    margin: 0 auto;
    min-height: 100%;
    -webkit-box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.5);
    position: relative;
}

.layout-boxed {
    background-color: #f9fafc;
}

/*
 * Content Wrapper - contains the main content
 */

.content-wrapper,
.main-footer {
    -webkit-transition: -webkit-transform 0.3s ease-in-out, margin 0.3s ease-in-out;
    -webkit-transition: margin 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
    transition: margin 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
    transition: transform 0.3s ease-in-out, margin 0.3s ease-in-out;
    transition: transform 0.3s ease-in-out, margin 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
    margin-left: 230px;
    z-index: 820;
}

.layout-top-nav .content-wrapper,
.layout-top-nav .main-footer {
    margin-left: 0;
}

@media (max-width: 767px) {
    .content-wrapper,
    .main-footer {
        margin-left: 0;
    }
}

@media (min-width: 768px) {
    .sidebar-collapse .content-wrapper,
    .sidebar-collapse .main-footer {
        margin-left: 0;
    }
}

@media (max-width: 767px) {
    .sidebar-open .content-wrapper,
    .sidebar-open .main-footer {
        -webkit-transform: translate(230px, 0);
        transform: translate(230px, 0);
    }
}

.content-wrapper {
    min-height: 100%;
    background-color: #ecf0f5;
    z-index: 800;
}

.main-footer {
    background: #fff;
    padding: 15px;
    color: #444;
    border-top: 1px solid #d2d6de;
}

/* Fixed layout */

.fixed .main-header,
.fixed .main-sidebar,
.fixed .left-side {
    position: fixed;
}

.fixed .main-header {
    top: 0;
    right: 0;
    left: 0;
}

.fixed .content-wrapper,
.fixed .right-side {
    padding-top: 50px;
}

@media (max-width: 767px) {
    .fixed .content-wrapper,
    .fixed .right-side {
        padding-top: 100px;
    }
}

.fixed.layout-boxed .wrapper {
    max-width: 100%;
}

.fixed .wrapper {
    overflow: hidden;
}

.hold-transition .content-wrapper,
.hold-transition .right-side,
.hold-transition .main-footer,
.hold-transition .main-sidebar,
.hold-transition .left-side,
.hold-transition .main-header .navbar,
.hold-transition .main-header .logo,
.hold-transition .menu-open .fa-angle-left {
    /* Fix for IE */
    -webkit-transition: none;
    transition: none;
}

/* Content */

.content {
    min-height: 250px;
    padding: 15px;
    margin-right: auto;
    margin-left: auto;
    padding-left: 15px;
    padding-right: 15px;
}

/* H1 - H6 font */

h1,
h2,
h3,
h4,
h5,
h6,
.h1,
.h2,
.h3,
.h4,
.h5,
.h6 {
    font-family: 'Source Sans Pro', sans-serif;

}

/* General Links */

a {
    color: #3c8dbc;
}

a:hover,
a:active,
a:focus {
    outline: none;
    text-decoration: none;
    color: #72afd2;
}

/* Page Header */

.page-header {
    margin: 10px 0 20px 0;
    font-size: 22px;
}

.page-header > small {
    color: #666;
    display: block;
    margin-top: 5px;
}

/*
 * Component: Main Header
 * ----------------------
 */

.main-header {
    position: relative;
    max-height: 100px;
    z-index: 1030;
}

.main-header .navbar {
    -webkit-transition: margin-left 0.3s ease-in-out;
    transition: margin-left 0.3s ease-in-out;
    margin-bottom: 0;
    margin-left: 230px;
    border: none;
    min-height: 50px;
    border-radius: 0;
}

.layout-top-nav .main-header .navbar {
    margin-left: 0;
}

.main-header #navbar-search-input.form-control {
    background: rgba(255, 255, 255, 0.2);
    border-color: transparent;
}

.main-header #navbar-search-input.form-control:focus,
.main-header #navbar-search-input.form-control:active {
    border-color: rgba(0, 0, 0, 0.1);
    background: rgba(255, 255, 255, 0.9);
}

.main-header #navbar-search-input.form-control::-moz-placeholder {
    color: #ccc;
    opacity: 1;
}

.main-header #navbar-search-input.form-control:-ms-input-placeholder {
    color: #ccc;
}

.main-header #navbar-search-input.form-control::-webkit-input-placeholder {
    color: #ccc;
}

.main-header .navbar-custom-menu,
.main-header .navbar-right {
    float: right;
}

@media (max-width: 991px) {
    .main-header .navbar-custom-menu a,
    .main-header .navbar-right a {
        color: inherit;
        background: transparent;
    }
}

@media (max-width: 767px) {
    .main-header .navbar-right {
        float: none;
    }

    .navbar-collapse .main-header .navbar-right {
        margin: 7.5px -15px;
    }

    .main-header .navbar-right > li {
        color: inherit;
        border: 0;
    }
}

.main-header .sidebar-toggle {
    float: left;
    background-color: transparent;
    background-image: none;
    padding: 15px 15px;
    font-family: fontAwesome;
}

.main-header .sidebar-toggle:before {
    content: "\F0C9";
}

.main-header .sidebar-toggle:hover {
    color: #fff;
}

.main-header .sidebar-toggle:focus,
.main-header .sidebar-toggle:active {
    background: transparent;
}

.main-header .sidebar-toggle .icon-bar {
    display: none;
}

.main-header .navbar .nav > li.user > a > .fa,
.main-header .navbar .nav > li.user > a > .glyphicon,
.main-header .navbar .nav > li.user > a > .ion {
    margin-right: 5px;
}

.main-header .navbar .nav > li > a > .label {
    position: absolute;
    top: 9px;
    right: 7px;
    text-align: center;
    font-size: 9px;
    padding: 2px 3px;
    line-height: .9;
}

.main-header .logo {
    -webkit-transition: width 0.3s ease-in-out;
    transition: width 0.3s ease-in-out;
    display: block;
    float: left;
    height: 50px;
    font-size: 20px;
    line-height: 50px;
    text-align: center;
    width: 230px;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    padding: 0 15px;
    font-weight: 300;
    overflow: hidden;
}

.main-header .logo .logo-lg {
    display: block;
}

.main-header .logo .logo-mini {
    display: none;
}

.main-header .navbar-brand {
    color: #fff;
}

.content-header {
    position: relative;
    padding: 15px 15px 0 15px;
}

.content-header > h1 {
    margin: 0;
    font-size: 24px;
}

.content-header > h1 > small {
    font-size: 15px;
    display: inline-block;
    padding-left: 4px;
    font-weight: 300;
}

.content-header > .breadcrumb {
    float: right;
    background: transparent;
    margin-top: 0;
    margin-bottom: 0;
    font-size: 12px;
    padding: 7px 5px;
    position: absolute;
    top: 15px;
    right: 10px;
    border-radius: 2px;
}

.content-header > .breadcrumb > li > a {
    color: #444;
    text-decoration: none;
    display: inline-block;
}

.content-header > .breadcrumb > li > a > .fa,
.content-header > .breadcrumb > li > a > .glyphicon,
.content-header > .breadcrumb > li > a > .ion {
    margin-right: 5px;
}

.content-header > .breadcrumb > li + li:before {
    content: '>\A0';
}

@media (max-width: 991px) {
    .content-header > .breadcrumb {
        position: relative;
        margin-top: 5px;
    top: 0;
        right: 0;
        float: none;
        background: #d2d6de;
        padding-left: 10px;
    }

    .content-header > .breadcrumb li:before {
        color: #97a0b3;
    }
}

.navbar-toggle {
    color: #fff;
    border: 0;
    margin: 0;
    padding: 15px 15px;
}

@media (max-width: 991px) {
    .navbar-custom-menu .navbar-nav > li {
        float: left;
    }

    .navbar-custom-menu .navbar-nav {
        margin: 0;
        float: left;
    }

    .navbar-custom-menu .navbar-nav > li > a {
        padding-top: 15px;
        padding-bottom: 15px;
        line-height: 20px;
    }
}

@media (max-width: 767px) {
    .main-header {
        position: relative;
    }

    .main-header .logo,
    .main-header .navbar {
        width: 100%;
        float: none;
    }

    .main-header .navbar {
        margin: 0;
    }

    .main-header .navbar-custom-menu {
        float: right;
    }
}

@media (max-width: 991px) {
    .navbar-collapse.pull-left {
        float: none !important;
    }

    .navbar-collapse.pull-left + .navbar-custom-menu {
    display: block;
        position: absolute;
        top: 0;
        right: 40px;
    }
}

/*
 * Component: Sidebar
 * ------------------
 */

.main-sidebar {
    position: absolute;
    top: 0;
    left: 0;
    padding-top: 50px;
    min-height: 100%;
    width: 230px;
    z-index: 810;
    -webkit-transition: -webkit-transform 0.3s ease-in-out, width 0.3s ease-in-out;
    -webkit-transition: width 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
    transition: width 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
    transition: transform 0.3s ease-in-out, width 0.3s ease-in-out;
    transition: transform 0.3s ease-in-out, width 0.3s ease-in-out, -webkit-transform 0.3s ease-in-out;
}

@media (max-width: 767px) {
    .main-sidebar {
        padding-top: 100px;
    }
}

@media (max-width: 767px) {
    .main-sidebar {
        -webkit-transform: translate(-230px, 0);
        transform: translate(-230px, 0);
    }
}

@media (min-width: 768px) {
    .sidebar-collapse .main-sidebar {
        -webkit-transform: translate(-230px, 0);
        transform: translate(-230px, 0);
    }
}

@media (max-width: 767px) {
    .sidebar-open .main-sidebar {
        -webkit-transform: translate(0, 0);
        transform: translate(0, 0);
    }
}

.sidebar {
    padding-bottom: 10px;
}

.sidebar-form input:focus {
    border-color: transparent;
}

.user-panel {
    position: relative;
    width: 100%;
    padding: 10px;
    overflow: hidden;
}

.user-panel:before,
.user-panel:after {
    content: " ";
    display: table;
}

.user-panel:after {
    clear: both;
}

.user-panel > .image > img {
    width: 100%;
    max-width: 45px;
    height: auto;
}

.user-panel > .info {
    padding: 5px 5px 5px 15px;
    line-height: 1;
    position: absolute;
    left: 55px;
}

.user-panel > .info > p {
    font-weight: 600;
    margin-bottom: 9px;
}

.user-panel > .info > a {
    text-decoration: none;
    padding-right: 5px;
    margin-top: 3px;
    font-size: 11px;
}

.user-panel > .info > a > .fa,
.user-panel > .info > a > .ion,
.user-panel > .info > a > .glyphicon {
    margin-right: 3px;
}

.sidebar-menu {
    list-style: none;
    margin: 0;
    padding: 0;
}

.sidebar-menu > li {
    position: relative;
    margin: 0;
    padding: 0;
}

.sidebar-menu > li > a {
    padding: 12px 5px 12px 15px;
    display: block;
}

.sidebar-menu > li > a > .fa,
.sidebar-menu > li > a > .glyphicon,
.sidebar-menu > li > a > .ion {
    width: 20px;
}

.sidebar-menu > li .label,
.sidebar-menu > li .badge {
    margin-right: 5px;
}

.sidebar-menu > li .badge {
    margin-top: 3px;
}

.sidebar-menu li.header {
    padding: 10px 25px 10px 15px;
    font-size: 12px;
}

.sidebar-menu li > a > .fa-angle-left,
.sidebar-menu li > a > .pull-right-container > .fa-angle-left {
    width: auto;
    height: auto;
    padding: 0;
    margin-right: 10px;
    -webkit-transition: transform 0.5s ease;
    -webkit-transition: -webkit-transform 0.5s ease;
    transition: -webkit-transform 0.5s ease;
    transition: transform 0.5s ease;
    transition: transform 0.5s ease, -webkit-transform 0.5s ease;
}

.sidebar-menu li > a > .fa-angle-left {
    position: absolute;
    top: 50%;
    right: 10px;
    margin-top: -8px;
}

.sidebar-menu .menu-open > a > .fa-angle-left,
.sidebar-menu .menu-open > a > .pull-right-container > .fa-angle-left {
    -webkit-transform: rotate(-90deg);
    transform: rotate(-90deg);
}

.sidebar-menu .active > .treeview-menu {
    display: block;
}

/*
 * Component: Sidebar Mini
 */

@media (min-width: 768px) {
    .sidebar-mini.sidebar-collapse .content-wrapper,
    .sidebar-mini.sidebar-collapse .right-side,
    .sidebar-mini.sidebar-collapse .main-footer {
        margin-left: 50px !important;
        z-index: 840;
    }

    .sidebar-mini.sidebar-collapse .main-sidebar {
        -webkit-transform: translate(0, 0);
        transform: translate(0, 0);
        width: 50px !important;
        z-index: 850;
    }

    .sidebar-mini.sidebar-collapse .sidebar-menu > li {
    position: relative;
    }

    .sidebar-mini.sidebar-collapse .sidebar-menu > li > a {
    margin-right: 0;
    }

    .sidebar-mini.sidebar-collapse .sidebar-menu > li > a > span {
        border-top-right-radius: 4px;
    }

    .sidebar-mini.sidebar-collapse .sidebar-menu > li:not(.treeview) > a > span {
        border-bottom-right-radius: 4px;
    }

    .sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu {
        padding-top: 5px;
        padding-bottom: 5px;
        border-bottom-right-radius: 4px;
    }

    .sidebar-mini.sidebar-collapse .main-sidebar .user-panel > .info,
    .sidebar-mini.sidebar-collapse .sidebar-form,
    .sidebar-mini.sidebar-collapse .sidebar-menu > li > a > span,
    .sidebar-mini.sidebar-collapse .sidebar-menu > li > .treeview-menu,
    .sidebar-mini.sidebar-collapse .sidebar-menu > li > a > .pull-right,
    .sidebar-mini.sidebar-collapse .sidebar-menu li.header {
        display: none !important;
        -webkit-transform: translateZ(0);
    }

    .sidebar-mini.sidebar-collapse .main-header .logo {
        width: 50px;
    }

    .sidebar-mini.sidebar-collapse .main-header .logo > .logo-mini {
        display: block;
        margin-left: -15px;
        margin-right: -15px;
        font-size: 18px;
    }

    .sidebar-mini.sidebar-collapse .main-header .logo > .logo-lg {
        display: none;
    }

    .sidebar-mini.sidebar-collapse .main-header .navbar {
        margin-left: 50px;
    }
}

.sidebar-mini:not(.sidebar-mini-expand-feature).sidebar-collapse .sidebar-menu > li:hover > a > span:not(.pull-right),
.sidebar-mini:not(.sidebar-mini-expand-feature).sidebar-collapse .sidebar-menu > li:hover > .treeview-menu {
    display: block !important;
    position: absolute;
    width: 180px;
    left: 50px;
}

.sidebar-mini:not(.sidebar-mini-expand-feature).sidebar-collapse .sidebar-menu > li:hover > a > span {
    top: 0;
    margin-left: -3px;
    padding: 12px 5px 12px 20px;
    background-color: inherit;
}

.sidebar-mini:not(.sidebar-mini-expand-feature).sidebar-collapse .sidebar-menu > li:hover > a > .pull-right-container {
    position: relative !important;
    float: right;
    width: auto !important;
    left: 180px !important;
    top: -22px !important;
    z-index: 900;
}

.sidebar-mini:not(.sidebar-mini-expand-feature).sidebar-collapse .sidebar-menu > li:hover > a > .pull-right-container > .label:not(:first-of-type) {
    display: none;
}

.sidebar-mini:not(.sidebar-mini-expand-feature).sidebar-collapse .sidebar-menu > li:hover > .treeview-menu {
    top: 44px;
    margin-left: 0;
}

.sidebar-expanded-on-hover .main-footer,
.sidebar-expanded-on-hover .content-wrapper {
    margin-left: 50px;
}

.sidebar-expanded-on-hover .main-sidebar {
    -webkit-box-shadow: 3px 0 8px rgba(0, 0, 0, 0.125);
    box-shadow: 3px 0 8px rgba(0, 0, 0, 0.125);
}

.sidebar-menu,
.main-sidebar .user-panel,
.sidebar-menu > li.header {
    white-space: nowrap;
    overflow: hidden;
}

.sidebar-menu:hover {
    overflow: visible;
}

.sidebar-form,
.sidebar-menu > li.header {
    overflow: hidden;
    text-overflow: clip;
}

.sidebar-menu li > a {
    position: relative;
}

.sidebar-menu li > a > .pull-right-container {
    position: absolute;
    right: 10px;
    top: 50%;
    margin-top: -7px;
}

/*
 * Component: Control sidebar. By default, this is the right sidebar.
 */

.control-sidebar-bg {
    position: fixed;
    z-index: 1000;
    bottom: 0;
}

.control-sidebar-bg,
.control-sidebar {
    top: 0;
    right: -230px;
    width: 230px;
    -webkit-transition: right 0.3s ease-in-out;
    transition: right 0.3s ease-in-out;
}

.control-sidebar {
    position: absolute;
    padding-top: 50px;
    z-index: 1010;
}

@media (max-width: 767px) {
    .control-sidebar {
        padding-top: 100px;
    }
}

.control-sidebar > .tab-content {
    padding: 10px 15px;
}

.control-sidebar.control-sidebar-open,
.control-sidebar.control-sidebar-open + .control-sidebar-bg {
    right: 0;
}

.control-sidebar-open .control-sidebar-bg,
.control-sidebar-open .control-sidebar {
    right: 0;
}

@media (min-width: 768px) {
    .control-sidebar-open .content-wrapper,
    .control-sidebar-open .right-side,
    .control-sidebar-open .main-footer {
        margin-right: 230px;
    }
}

.fixed .control-sidebar {
    position: fixed;
    height: 100%;
    overflow-y: auto;
    padding-bottom: 50px;
}

.nav-tabs.control-sidebar-tabs > li:first-of-type > a,
.nav-tabs.control-sidebar-tabs > li:first-of-type > a:hover,
.nav-tabs.control-sidebar-tabs > li:first-of-type > a:focus {
    border-left-width: 0;
}

.nav-tabs.control-sidebar-tabs > li > a {
    border-radius: 0;
}

.nav-tabs.control-sidebar-tabs > li > a,
.nav-tabs.control-sidebar-tabs > li > a:hover {
    border-top: none;
    border-right: none;
    border-left: 1px solid transparent;
    border-bottom: 1px solid transparent;
}

.nav-tabs.control-sidebar-tabs > li > a .icon {
    font-size: 16px;
}

.nav-tabs.control-sidebar-tabs > li.active > a,
.nav-tabs.control-sidebar-tabs > li.active > a:hover,
.nav-tabs.control-sidebar-tabs > li.active > a:focus,
.nav-tabs.control-sidebar-tabs > li.active > a:active {
    border-top: none;
    border-right: none;
    border-bottom: none;
}

@media (max-width: 768px) {
    .nav-tabs.control-sidebar-tabs {
        display: table;
    }

    .nav-tabs.control-sidebar-tabs > li {
        display: table-cell;
    }
}

.control-sidebar-heading {
    font-weight: 400;
    font-size: 16px;
    padding: 10px 0;
    margin-bottom: 10px;
}

.control-sidebar-subheading {
    display: block;
    font-weight: 400;
    font-size: 14px;
}

.control-sidebar-menu {
    list-style: none;
    padding: 0;
    margin: 0 -15px;
}

.control-sidebar-menu > li > a {
    display: block;
    padding: 10px 15px;
}

.control-sidebar-menu > li > a:before,
.control-sidebar-menu > li > a:after {
    content: " ";
    display: table;
}

.control-sidebar-menu > li > a:after {
    clear: both;
}

.control-sidebar-menu > li > a > .control-sidebar-subheading {
    margin-top: 0;
}

.control-sidebar-menu .menu-icon {
    float: left;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    text-align: center;
    line-height: 35px;
}

.control-sidebar-menu .menu-info {
    margin-left: 45px;
    margin-top: 3px;
}

.control-sidebar-menu .menu-info > .control-sidebar-subheading {
    margin: 0;
}

.control-sidebar-menu .menu-info > p {
    margin: 0;
    font-size: 11px;
}

.control-sidebar-menu .progress {
    margin: 0;
}

.control-sidebar-dark {
    color: #b8c7ce;
}

.control-sidebar-dark,
.control-sidebar-dark + .control-sidebar-bg {
    background: #222d32;
}

.control-sidebar-dark .nav-tabs.control-sidebar-tabs {
    border-bottom: #1c2529;
}

.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a {
    background: #181f23;
    color: #b8c7ce;
}

.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a,
.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover,
.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:focus {
    border-left-color: #141a1d;
    border-bottom-color: #141a1d;
}

.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover,
.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:focus,
.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:active {
    background: #1c2529;
}

.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li > a:hover {
    color: #fff;
}

.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a,
.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:hover,
.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:focus,
.control-sidebar-dark .nav-tabs.control-sidebar-tabs > li.active > a:active {
    background: #222d32;
    color: #fff;
}

.control-sidebar-dark .control-sidebar-heading,
.control-sidebar-dark .control-sidebar-subheading {
    color: #fff;
}

.control-sidebar-dark .control-sidebar-menu > li > a:hover {
    background: #1e282c;
}

.control-sidebar-dark .control-sidebar-menu > li > a .menu-info > p {
    color: #b8c7ce;
}

.control-sidebar-light {
    color: #5e5e5e;
}

.control-sidebar-light,
.control-sidebar-light + .control-sidebar-bg {
    background: #f9fafc;
    border-left: 1px solid #d2d6de;
}

.control-sidebar-light .nav-tabs.control-sidebar-tabs {
    border-bottom: #d2d6de;
}

.control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a {
    background: #e8ecf4;
    color: #444444;
}

.control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a,
.control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:hover,
.control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:focus {
    border-left-color: #d2d6de;
    border-bottom-color: #d2d6de;
}

.control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:hover,
.control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:focus,
.control-sidebar-light .nav-tabs.control-sidebar-tabs > li > a:active {
    background: #eff1f7;
}

.control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a,
.control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a:hover,
.control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a:focus,
.control-sidebar-light .nav-tabs.control-sidebar-tabs > li.active > a:active {
    background: #f9fafc;
    color: #111;
}

.control-sidebar-light .control-sidebar-heading,
.control-sidebar-light .control-sidebar-subheading {
    color: #111;
}

.control-sidebar-light .control-sidebar-menu {
    margin-left: -14px;
}

.control-sidebar-light .control-sidebar-menu > li > a:hover {
    background: #f4f4f5;
}

.control-sidebar-light .control-sidebar-menu > li > a .menu-info > p {
    color: #5e5e5e;
}

/*
 * Component: Dropdown menus
 * -------------------------
 */

/*Dropdowns in general*/

.dropdown-menu {
    -webkit-box-shadow: none;
    box-shadow: none;
    border-color: #eee;
}

.dropdown-menu > li > a {
    color: #777;
}

.dropdown-menu > li > a > .glyphicon,
.dropdown-menu > li > a > .fa,
.dropdown-menu > li > a > .ion {
    margin-right: 10px;
}

.dropdown-menu > li > a:hover {
    background-color: #e1e3e9;
    color: #333;
}

.dropdown-menu > .divider {
    background-color: #eee;
}

.navbar-nav > .notifications-menu > .dropdown-menu,
.navbar-nav > .messages-menu > .dropdown-menu,
.navbar-nav > .tasks-menu > .dropdown-menu {
    width: 280px;
    padding: 0 0 0 0;
    margin: 0;
    top: 100%;
}

.navbar-nav > .notifications-menu > .dropdown-menu > li,
.navbar-nav > .messages-menu > .dropdown-menu > li,
.navbar-nav > .tasks-menu > .dropdown-menu > li {
    position: relative;
}

.navbar-nav > .notifications-menu > .dropdown-menu > li.header,
.navbar-nav > .messages-menu > .dropdown-menu > li.header,
.navbar-nav > .tasks-menu > .dropdown-menu > li.header {
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    background-color: #ffffff;
    padding: 7px 10px;
    border-bottom: 1px solid #f4f4f4;
    color: #444444;
    font-size: 14px;
}

.navbar-nav > .notifications-menu > .dropdown-menu > li.footer > a,
.navbar-nav > .messages-menu > .dropdown-menu > li.footer > a,
.navbar-nav > .tasks-menu > .dropdown-menu > li.footer > a {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
    font-size: 12px;
    background-color: #fff;
    padding: 7px 10px;
    border-bottom: 1px solid #eeeeee;
    color: #444 !important;
    text-align: center;
}

@media (max-width: 991px) {
    .navbar-nav > .notifications-menu > .dropdown-menu > li.footer > a,
    .navbar-nav > .messages-menu > .dropdown-menu > li.footer > a,
    .navbar-nav > .tasks-menu > .dropdown-menu > li.footer > a {
        background: #fff !important;
        color: #444 !important;
    }
}

.navbar-nav > .notifications-menu > .dropdown-menu > li.footer > a:hover,
.navbar-nav > .messages-menu > .dropdown-menu > li.footer > a:hover,
.navbar-nav > .tasks-menu > .dropdown-menu > li.footer > a:hover {
    text-decoration: none;
    font-weight: normal;
}

.navbar-nav > .notifications-menu > .dropdown-menu > li .menu,
.navbar-nav > .messages-menu > .dropdown-menu > li .menu,
.navbar-nav > .tasks-menu > .dropdown-menu > li .menu {
    max-height: 200px;
    margin: 0;
    padding: 0;
    list-style: none;
    overflow-x: hidden;
}

.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a,
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a,
.navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a {
    display: block;
    white-space: nowrap;
    /* Prevent text from breaking */
    border-bottom: 1px solid #f4f4f4;
}

.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a:hover,
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:hover,
.navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a:hover {
    background: #f4f4f4;
    text-decoration: none;
}

.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a {
    color: #444444;
    overflow: hidden;
    text-overflow: ellipsis;
    padding: 10px;
}

.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a > .glyphicon,
.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a > .fa,
.navbar-nav > .notifications-menu > .dropdown-menu > li .menu > li > a > .ion {
    width: 20px;
}

.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a {
    margin: 0;
    padding: 10px 10px;
}

.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > div > img {
    margin: auto 10px auto auto;
    width: 40px;
    height: 40px;
}

.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > h4 {
    padding: 0;
    margin: 0 0 0 45px;
    color: #444444;
    font-size: 15px;
    position: relative;
}

.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > h4 > small {
    color: #999999;
    font-size: 10px;
    position: absolute;
    top: 0;
    right: 0;
}

.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a > p {
    margin: 0 0 0 45px;
    font-size: 12px;
    color: #888888;
}

.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:before,
.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:after {
    content: " ";
    display: table;
}

.navbar-nav > .messages-menu > .dropdown-menu > li .menu > li > a:after {
    clear: both;
}

.navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a {
    padding: 10px;
}

.navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a > h3 {
    font-size: 14px;
    padding: 0;
    margin: 0 0 10px 0;
    color: #666666;
}

.navbar-nav > .tasks-menu > .dropdown-menu > li .menu > li > a > .progress {
    padding: 0;
    margin: 0;
}

.navbar-nav > .user-menu > .dropdown-menu {
    border-top-right-radius: 0;
    border-top-left-radius: 0;
    padding: 1px 0 0 0;
    border-top-width: 0;
    width: 280px;
}

.navbar-nav > .user-menu > .dropdown-menu,
.navbar-nav > .user-menu > .dropdown-menu > .user-body {
    border-bottom-right-radius: 4px;
    border-bottom-left-radius: 4px;
}

.navbar-nav > .user-menu > .dropdown-menu > li.user-header {
    height: 175px;
    padding: 10px;
    text-align: center;
}

.navbar-nav > .user-menu > .dropdown-menu > li.user-header > img {
    z-index: 5;
    height: 90px;
    width: 90px;
    border: 3px solid;
    border-color: transparent;
    border-color: rgba(255, 255, 255, 0.2);
}

.navbar-nav > .user-menu > .dropdown-menu > li.user-header > p {
    z-index: 5;
    color: #fff;
    color: rgba(255, 255, 255, 0.8);
    font-size: 17px;
    margin-top: 10px;
}

.navbar-nav > .user-menu > .dropdown-menu > li.user-header > p > small {
    display: block;
    font-size: 12px;
}

.navbar-nav > .user-menu > .dropdown-menu > .user-body {
    padding: 15px;
    border-bottom: 1px solid #f4f4f4;
    border-top: 1px solid #dddddd;
}

.navbar-nav > .user-menu > .dropdown-menu > .user-body:before,
.navbar-nav > .user-menu > .dropdown-menu > .user-body:after {
    content: " ";
    display: table;
}

.navbar-nav > .user-menu > .dropdown-menu > .user-body:after {
    clear: both;
}

.navbar-nav > .user-menu > .dropdown-menu > .user-body a {
    color: #444 !important;
}

@media (max-width: 991px) {
    .navbar-nav > .user-menu > .dropdown-menu > .user-body a {
        background: #fff !important;
        color: #444 !important;
    }
}

.navbar-nav > .user-menu > .dropdown-menu > .user-footer {
    background-color: #f9f9f9;
    padding: 10px;
}

.navbar-nav > .user-menu > .dropdown-menu > .user-footer:before,
.navbar-nav > .user-menu > .dropdown-menu > .user-footer:after {
    content: " ";
    display: table;
}

.navbar-nav > .user-menu > .dropdown-menu > .user-footer:after {
    clear: both;
}

.navbar-nav > .user-menu > .dropdown-menu > .user-footer .btn-default {
    color: #666666;
}

@media (max-width: 991px) {
    .navbar-nav > .user-menu > .dropdown-menu > .user-footer .btn-default:hover {
        background-color: #f9f9f9;
    }
}

.navbar-nav > .user-menu .user-image {
    float: left;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    margin-right: 10px;
    margin-top: -2px;
}

@media (max-width: 767px) {
    .navbar-nav > .user-menu .user-image {
        float: none;
        margin-right: 0;
        margin-top: -8px;
        line-height: 10px;
    }
}

/* Add fade animation to dropdown menus by appending
 the class .animated-dropdown-menu to the .dropdown-menu ul (or ol)*/

.open:not(.dropup) > .animated-dropdown-menu {
    -webkit-backface-visibility: visible !important;
    backface-visibility: visible !important;
    -webkit-animation: flipInX 0.7s both;
    animation: flipInX 0.7s both;
}

@keyframes flipInX {
    0% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        -webkit-transition-timing-function: ease-in;
        transition-timing-function: ease-in;
        opacity: 0;
    }

    40% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        -webkit-transition-timing-function: ease-in;
        transition-timing-function: ease-in;
    }

    60% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
        transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
        opacity: 1;
    }

    80% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
        transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    }

    100% {
        -webkit-transform: perspective(400px);
        transform: perspective(400px);
    }
}

@-webkit-keyframes flipInX {
    0% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
        -webkit-transition-timing-function: ease-in;
        opacity: 0;
    }

    40% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
        -webkit-transition-timing-function: ease-in;
    }

    60% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
        opacity: 1;
    }

    80% {
        -webkit-transform: perspective(400px) rotate3d(1, 0, 0, -5deg);
    }

    100% {
        -webkit-transform: perspective(400px);
    }
}

/* Fix dropdown menu in navbars */

.navbar-custom-menu > .navbar-nav > li {
    position: relative;
}

.navbar-custom-menu > .navbar-nav > li > .dropdown-menu {
    position: absolute;
    right: 0;
    left: auto;
}

@media (max-width: 991px) {
    .navbar-custom-menu > .navbar-nav {
        float: right;
    }

    .navbar-custom-menu > .navbar-nav > li {
        position: static;
    }

    .navbar-custom-menu > .navbar-nav > li > .dropdown-menu {
        position: absolute;
        right: 5%;
        left: auto;
        border: 1px solid #ddd;
        background: #fff;
    }
}

/*
 * Component: Form
 * ---------------
 */

.form-control {
    border-radius: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-color: #d2d6de;
}

.form-control:focus {
    border-color: #3c8dbc;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.form-control::-moz-placeholder,
.form-control:-ms-input-placeholder,
.form-control::-webkit-input-placeholder {
    color: #bbb;
    opacity: 1;
}

.form-control:not(select) {
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.form-group.has-success label {
    color: #00a65a;
}

.form-group.has-success .form-control,
.form-group.has-success .input-group-addon {
    border-color: #00a65a;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.form-group.has-success .help-block {
    color: #00a65a;
}

.form-group.has-warning label {
    color: #f39c12;
}

.form-group.has-warning .form-control,
.form-group.has-warning .input-group-addon {
    border-color: #f39c12;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.form-group.has-warning .help-block {
    color: #f39c12;
}

.form-group.has-error label {
    color: #dd4b39;
}

.form-group.has-error .form-control,
.form-group.has-error .input-group-addon {
    border-color: #dd4b39;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.form-group.has-error .help-block {
    color: #dd4b39;
}

/* Input group */

.input-group .input-group-addon {
    border-radius: 0;
    border-color: #d2d6de;
    background-color: #fff;
}

/* button groups */

.btn-group-vertical .btn.btn-flat:first-of-type,
.btn-group-vertical .btn.btn-flat:last-of-type {
    border-radius: 0;
}

.icheck > label {
    padding-left: 0;
}

/* support Font Awesome icons in form-control */

.form-control-feedback.fa {
    line-height: 34px;
}

.input-lg + .form-control-feedback.fa,
.input-group-lg + .form-control-feedback.fa,
.form-group-lg .form-control + .form-control-feedback.fa {
    line-height: 46px;
}

.input-sm + .form-control-feedback.fa,
.input-group-sm + .form-control-feedback.fa,
.form-group-sm .form-control + .form-control-feedback.fa {
    line-height: 30px;
}

/*
 * Component: Progress Bar
 * -----------------------
 */

.progress,
.progress > .progress-bar {
    -webkit-box-shadow: none;
    box-shadow: none;
}

.progress,
.progress > .progress-bar,
.progress .progress-bar,
.progress > .progress-bar .progress-bar {
    border-radius: 1px;
}

/* size variation */

.progress.sm,
.progress-sm {
    height: 10px;
}

.progress.sm,
.progress-sm,
.progress.sm .progress-bar,
.progress-sm .progress-bar {
    border-radius: 1px;
}

.progress.xs,
.progress-xs {
    height: 7px;
}

.progress.xs,
.progress-xs,
.progress.xs .progress-bar,
.progress-xs .progress-bar {
    border-radius: 1px;
}

.progress.xxs,
.progress-xxs {
    height: 3px;
}

.progress.xxs,
.progress-xxs,
.progress.xxs .progress-bar,
.progress-xxs .progress-bar {
    border-radius: 1px;
}

/* Vertical bars */

.progress.vertical {
    position: relative;
    width: 30px;
    height: 200px;
    display: inline-block;
    margin-right: 10px;
}

.progress.vertical > .progress-bar {
    width: 100%;
    position: absolute;
    bottom: 0;
}

.progress.vertical.sm,
.progress.vertical.progress-sm {
    width: 20px;
}

.progress.vertical.xs,
.progress.vertical.progress-xs {
    width: 10px;
}

.progress.vertical.xxs,
.progress.vertical.progress-xxs {
    width: 3px;
}

.progress-group .progress-text {
    font-weight: 600;
}

.progress-group .progress-number {
    float: right;
}

/* Remove margins from progress bars when put in a table */

.table tr > td .progress {
    margin: 0;
}

.progress-bar-light-blue,
.progress-bar-primary {
    background-color: #3c8dbc;
}

.progress-striped .progress-bar-light-blue,
.progress-striped .progress-bar-primary {
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.progress-bar-green,
.progress-bar-success {
    background-color: #00a65a;
}

.progress-striped .progress-bar-green,
.progress-striped .progress-bar-success {
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.progress-bar-aqua,
.progress-bar-info {
    background-color: #00c0ef;
}

.progress-striped .progress-bar-aqua,
.progress-striped .progress-bar-info {
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.progress-bar-yellow,
.progress-bar-warning {
    background-color: #f39c12;
}

.progress-striped .progress-bar-yellow,
.progress-striped .progress-bar-warning {
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

.progress-bar-red,
.progress-bar-danger {
    background-color: #dd4b39;
}

.progress-striped .progress-bar-red,
.progress-striped .progress-bar-danger {
    background-image: linear-gradient(45deg, rgba(255, 255, 255, 0.15) 25%, transparent 25%, transparent 50%, rgba(255, 255, 255, 0.15) 50%, rgba(255, 255, 255, 0.15) 75%, transparent 75%, transparent);
}

/*
 * Component: Small Box
 * --------------------
 */

.small-box {
    border-radius: 2px;
    position: relative;
    display: block;
    margin-bottom: 20px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}

.small-box > .inner {
    padding: 10px;
}

.small-box > .small-box-footer {
    position: relative;
    text-align: center;
    padding: 3px 0;
    color: #fff;
    color: rgba(255, 255, 255, 0.8);
    display: block;
    z-index: 10;
    background: rgba(0, 0, 0, 0.1);
    text-decoration: none;
}

.small-box > .small-box-footer:hover {
    color: #fff;
    background: rgba(0, 0, 0, 0.15);
}

.small-box h3 {
    font-size: 38px;
    font-weight: bold;
    margin: 0 0 10px 0;
    white-space: nowrap;
    padding: 0;
}

.small-box p {
    font-size: 15px;
}

.small-box p > small {
    display: block;
    color: #f9f9f9;
    font-size: 13px;
    margin-top: 5px;
}

.small-box h3,
.small-box p {
    z-index: 5;
}

.small-box .icon {
    -webkit-transition: all 0.3s linear;
    transition: all 0.3s linear;
    position: absolute;
    top: -10px;
    right: 10px;
    z-index: 0;
    font-size: 90px;
    color: rgba(0, 0, 0, 0.15);
}

.small-box:hover {
    text-decoration: none;
    color: #f9f9f9;
}

.small-box:hover .icon {
    font-size: 95px;
}

@media (max-width: 767px) {
    .small-box {
        text-align: center;
    }

    .small-box .icon {
        display: none;
    }

    .small-box p {
        font-size: 12px;
    }
}

/*
 * Component: Box
 * --------------
 */

.box {
    position: relative;
    border-radius: 3px;
    background: #ffffff;
    border-top: 3px solid #d2d6de;
    margin-bottom: 20px;
    width: 100%;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
}

.box.box-primary {
    border-top-color: #3c8dbc;
}

.box.box-info {
    border-top-color: #00c0ef;
}

.box.box-danger {
    border-top-color: #dd4b39;
}

.box.box-warning {
    border-top-color: #f39c12;
}

.box.box-success {
    border-top-color: #00a65a;
}

.box.box-default {
    border-top-color: #d2d6de;
}

.box.collapsed-box .box-body,
.box.collapsed-box .box-footer {
    display: none;
}

.box .nav-stacked > li {
    border-bottom: 1px solid #f4f4f4;
    margin: 0;
}

.box .nav-stacked > li:last-of-type {
    border-bottom: none;
}

.box.height-control .box-body {
    max-height: 300px;
    overflow: auto;
}

.box .border-right {
    border-right: 1px solid #f4f4f4;
}

.box .border-left {
    border-left: 1px solid #f4f4f4;
}

.box.box-solid {
    border-top: 0;
}

.box.box-solid > .box-header .btn.btn-default {
    background: transparent;
}

.box.box-solid > .box-header .btn:hover,
.box.box-solid > .box-header a:hover {
    background: rgba(0, 0, 0, 0.1);
}

.box.box-solid.box-default {
    border: 1px solid #d2d6de;
}

.box.box-solid.box-default > .box-header {
    color: #444444;
    background: #d2d6de;
    background-color: #d2d6de;
}

.box.box-solid.box-default > .box-header a,
.box.box-solid.box-default > .box-header .btn {
    color: #444444;
}

.box.box-solid.box-primary {
    border: 1px solid #3c8dbc;
}

.box.box-solid.box-primary > .box-header {
    color: #ffffff;
    background: #3c8dbc;
    background-color: #3c8dbc;
}

.box.box-solid.box-primary > .box-header a,
.box.box-solid.box-primary > .box-header .btn {
    color: #ffffff;
}

.box.box-solid.box-info {
    border: 1px solid #00c0ef;
}

.box.box-solid.box-info > .box-header {
    color: #ffffff;
    background: #00c0ef;
    background-color: #00c0ef;
}

.box.box-solid.box-info > .box-header a,
.box.box-solid.box-info > .box-header .btn {
    color: #ffffff;
}

.box.box-solid.box-danger {
    border: 1px solid #dd4b39;
}

.box.box-solid.box-danger > .box-header {
    color: #ffffff;
    background: #dd4b39;
    background-color: #dd4b39;
}

.box.box-solid.box-danger > .box-header a,
.box.box-solid.box-danger > .box-header .btn {
    color: #ffffff;
}

.box.box-solid.box-warning {
    border: 1px solid #f39c12;
}

.box.box-solid.box-warning > .box-header {
    color: #ffffff;
    background: #f39c12;
    background-color: #f39c12;
}

.box.box-solid.box-warning > .box-header a,
.box.box-solid.box-warning > .box-header .btn {
    color: #ffffff;
}

.box.box-solid.box-success {
    border: 1px solid #00a65a;
}

.box.box-solid.box-success > .box-header {
    color: #ffffff;
    background: #00a65a;
    background-color: #00a65a;
}

.box.box-solid.box-success > .box-header a,
.box.box-solid.box-success > .box-header .btn {
    color: #ffffff;
}

.box.box-solid > .box-header > .box-tools .btn {
    border: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.box.box-solid[class*='bg'] > .box-header {
    color: #fff;
}

.box .box-group > .box {
    margin-bottom: 5px;
}

.box .knob-label {
    text-align: center;
    color: #333;
    font-weight: 100;
    font-size: 12px;
    margin-bottom: 0.3em;
}

.box > .overlay,
.overlay-wrapper > .overlay,
.box > .loading-img,
.overlay-wrapper > .loading-img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
}

.box .overlay,
.overlay-wrapper .overlay {
    z-index: 50;
    background: rgba(255, 255, 255, 0.7);
    border-radius: 3px;
}

.box .overlay > .fa,
.overlay-wrapper .overlay > .fa {
    position: absolute;
    top: 50%;
    left: 50%;
    margin-left: -15px;
    margin-top: -15px;
    color: #000;
    font-size: 30px;
}

.box .overlay.dark,
.overlay-wrapper .overlay.dark {
    background: rgba(0, 0, 0, 0.5);
}

.box-header:before,
.box-body:before,
.box-footer:before,
.box-header:after,
.box-body:after,
.box-footer:after {
    content: " ";
    display: table;
}

.box-header:after,
.box-body:after,
.box-footer:after {
    clear: both;
}

.box-header {
    color: #444;
    display: block;
    padding: 10px;
    position: relative;
}

.box-header.with-border {
    border-bottom: 1px solid #f4f4f4;
}

.collapsed-box .box-header.with-border {
    border-bottom: none;
}

.box-header > .fa,
.box-header > .glyphicon,
.box-header > .ion,
.box-header .box-title {
    display: inline-block;
    font-size: 18px;
    margin: 0;
    line-height: 1;
}

.box-header > .fa,
.box-header > .glyphicon,
.box-header > .ion {
    margin-right: 5px;
}

.box-header > .box-tools {
    position: absolute;
    right: 10px;
    top: 5px;
}

.box-header > .box-tools [data-toggle="tooltip"] {
    position: relative;
}

.box-header > .box-tools.pull-right .dropdown-menu {
    right: 0;
    left: auto;
}

.box-header > .box-tools .dropdown-menu > li > a {
    color: #444 !important;
}

.btn-box-tool {
    padding: 5px;
    font-size: 12px;
    background: transparent;
    color: #97a0b3;
}

.open .btn-box-tool,
.btn-box-tool:hover {
    color: #606c84;
}

.btn-box-tool.btn:active {
    -webkit-box-shadow: none;
    box-shadow: none;
}

.box-body {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    padding: 10px;
}

.no-header .box-body {
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}

.box-body > .table {
    margin-bottom: 0;
}

.box-body .fc {
    margin-top: 5px;
}

.box-body .full-width-chart {
    margin: -19px;
}

.box-body.no-padding .full-width-chart {
    margin: -9px;
}

.box-body .box-pane {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 3px;
}

.box-body .box-pane-right {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 0;
}

.box-footer {
    border-top-left-radius: 0;
    border-top-right-radius: 0;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
    border-top: 1px solid #f4f4f4;
    padding: 10px;
    background-color: #ffffff;
}

.chart-legend {
    margin: 10px 0;
}

@media (max-width: 991px) {
    .chart-legend > li {
        float: left;
        margin-right: 10px;
    }
}

.box-comments {
    background: #f7f7f7;
}

.box-comments .box-comment {
    padding: 8px 0;
    border-bottom: 1px solid #eee;
}

.box-comments .box-comment:before,
.box-comments .box-comment:after {
    content: " ";
    display: table;
}

.box-comments .box-comment:after {
    clear: both;
}

.box-comments .box-comment:last-of-type {
    border-bottom: 0;
}

.box-comments .box-comment:first-of-type {
    padding-top: 0;
}

.box-comments .box-comment img {
    float: left;
}

.box-comments .comment-text {
    margin-left: 40px;
    color: #555;
}

.box-comments .username {
    color: #444;
    display: block;
    font-weight: 600;
}

.box-comments .text-muted {
    font-weight: 400;
    font-size: 12px;
}

/* Widget: TODO LIST */

.todo-list {
    margin: 0;
    padding: 0;
    list-style: none;
    overflow: auto;
}

.todo-list > li {
    border-radius: 2px;
    padding: 10px;
    background: #f4f4f4;
    margin-bottom: 2px;
    border-left: 2px solid #e6e7e8;
    color: #444;
}

.todo-list > li:last-of-type {
    margin-bottom: 0;
}

.todo-list > li > input[type='checkbox'] {
    margin: 0 10px 0 5px;
}

.todo-list > li .text {
    display: inline-block;
    margin-left: 5px;
    font-weight: 600;
}

.todo-list > li .label {
    margin-left: 10px;
    font-size: 9px;
}

.todo-list > li .tools {
    display: none;
    float: right;
    color: #dd4b39;
}

.todo-list > li .tools > .fa,
.todo-list > li .tools > .glyphicon,
.todo-list > li .tools > .ion {
    margin-right: 5px;
    cursor: pointer;
}

.todo-list > li:hover .tools {
    display: inline-block;
}

.todo-list > li.done {
    color: #999;
}

.todo-list > li.done .text {
    text-decoration: line-through;
    font-weight: 500;
}

.todo-list > li.done .label {
    background: #d2d6de !important;
}

.todo-list .danger {
    border-left-color: #dd4b39;
}

.todo-list .warning {
    border-left-color: #f39c12;
}

.todo-list .info {
    border-left-color: #00c0ef;
}

.todo-list .success {
    border-left-color: #00a65a;
}

.todo-list .primary {
    border-left-color: #3c8dbc;
}

.todo-list .handle {
    display: inline-block;
    cursor: move;
    margin: 0 5px;
}

/* Chat widget (DEPRECATED - this will be removed in the next major release. Use Direct Chat instead)*/

.chat {
    padding: 5px 20px 5px 10px;
}

.chat .item {
    margin-bottom: 10px;
}

.chat .item:before,
.chat .item:after {
    content: " ";
    display: table;
}

.chat .item:after {
    clear: both;
}

.chat .item > img {
    width: 40px;
    height: 40px;
    border: 2px solid transparent;
    border-radius: 50%;
}

.chat .item > .online {
    border: 2px solid #00a65a;
}

.chat .item > .offline {
    border: 2px solid #dd4b39;
}

.chat .item > .message {
    margin-left: 55px;
    margin-top: -40px;
}

.chat .item > .message > .name {
    display: block;
    font-weight: 600;
}

.chat .item > .attachment {
    border-radius: 3px;
    background: #f4f4f4;
    margin-left: 65px;
    margin-right: 15px;
    padding: 10px;
}

.chat .item > .attachment > h4 {
    margin: 0 0 5px 0;
    font-weight: 600;
    font-size: 14px;
}

.chat .item > .attachment > p,
.chat .item > .attachment > .filename {
    font-weight: 600;
    font-size: 13px;
    font-style: italic;
    margin: 0;
}

.chat .item > .attachment:before,
.chat .item > .attachment:after {
    content: " ";
    display: table;
}

.chat .item > .attachment:after {
    clear: both;
}

.box-input {
    max-width: 200px;
}

.modal .panel-body {
    color: #444;
}

/*
 * Component: Info Box
 * -------------------
 */

.info-box {
    display: block;
    min-height: 90px;
    background: #fff;
    width: 100%;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    border-radius: 2px;
    margin-bottom: 15px;
}

.info-box small {
    font-size: 14px;
}

.info-box .progress {
    background: rgba(0, 0, 0, 0.2);
    margin: 5px -10px 5px -10px;
    height: 2px;
}

.info-box .progress,
.info-box .progress .progress-bar {
    border-radius: 0;
}

.info-box .progress .progress-bar {
    background: #fff;
}

.info-box-icon {
    border-top-left-radius: 2px;
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 2px;
    display: block;
    float: left;
    height: 90px;
    width: 90px;
    text-align: center;
    font-size: 45px;
    line-height: 90px;
    background: rgba(0, 0, 0, 0.2);
}

.info-box-icon > img {
    max-width: 100%;
}

.info-box-content {
    padding: 5px 10px;
    margin-left: 90px;
}

.info-box-number {
    display: block;
    font-weight: bold;
    font-size: 18px;
}

.progress-description,
.info-box-text {
    display: block;
    font-size: 14px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.info-box-text {
    text-transform: uppercase;
}

.info-box-more {
    display: block;
}

.progress-description {
    margin: 0;
}

/*
 * Component: Timeline
 * -------------------
 */

.timeline {
    position: relative;
    margin: 0 0 30px 0;
    padding: 0;
    list-style: none;
}

.timeline:before {
    content: '';
    position: absolute;
    top: 0;
    bottom: 0;
    width: 4px;
    background: #ddd;
    left: 31px;
    margin: 0;
    border-radius: 2px;
}

.timeline > li {
    position: relative;
    margin-right: 10px;
    margin-bottom: 15px;
}

.timeline > li:before,
.timeline > li:after {
    content: " ";
    display: table;
}

.timeline > li:after {
    clear: both;
}

.timeline > li > .timeline-item {
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    border-radius: 3px;
    margin-top: 0;
    background: #fff;
    color: #444;
    margin-left: 60px;
    margin-right: 15px;
    padding: 0;
    position: relative;
}

.timeline > li > .timeline-item > .time {
    color: #999;
    float: right;
    padding: 10px;
    font-size: 12px;
}

.timeline > li > .timeline-item > .timeline-header {
    margin: 0;
    color: #555;
    border-bottom: 1px solid #f4f4f4;
    padding: 10px;
    font-size: 16px;
    line-height: 1.1;
}

.timeline > li > .timeline-item > .timeline-header > a {
    font-weight: 600;
}

.timeline > li > .timeline-item > .timeline-body,
.timeline > li > .timeline-item > .timeline-footer {
    padding: 10px;
}

.timeline > li > .fa,
.timeline > li > .glyphicon,
.timeline > li > .ion {
    width: 30px;
    height: 30px;
    font-size: 15px;
    line-height: 30px;
    position: absolute;
    color: #666;
    background: #d2d6de;
    border-radius: 50%;
    text-align: center;
    left: 18px;
    top: 0;
}

.timeline > .time-label > span {
    font-weight: 600;
    padding: 5px;
    display: inline-block;
    background-color: #fff;
    border-radius: 4px;
}

.timeline-inverse > li > .timeline-item {
    background: #f0f0f0;
    border: 1px solid #ddd;
    -webkit-box-shadow: none;
    box-shadow: none;
}

.timeline-inverse > li > .timeline-item > .timeline-header {
    border-bottom-color: #ddd;
}

/*
 * Component: Button
 * -----------------
 */

.btn {
    border-radius: 3px;
    -webkit-box-shadow: none;
    box-shadow: none;
    border: 1px solid transparent;
}

.btn.uppercase {
    text-transform: uppercase;
}

.btn.btn-flat {
    border-radius: 0;
    -webkit-box-shadow: none;
    box-shadow: none;
    border-width: 1px;
}

.btn:active {
    -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}

.btn:focus {
    outline: none;
}

.btn.btn-file {
    position: relative;
    overflow: hidden;
}

.btn.btn-file > input[type='file'] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    opacity: 0;
    filter: alpha(opacity=0);
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}

.btn-default {
    background-color: #f4f4f4;
    color: #444;
    border-color: #ddd;
}

.btn-default:hover,
.btn-default:active,
.btn-default.hover {
    background-color: #e7e7e7;
}

.btn-primary {
    background-color: #3c8dbc;
    border-color: #367fa9;
}

.btn-primary:hover,
.btn-primary:active,
.btn-primary.hover {
    background-color: #367fa9;
}

.btn-success {
    background-color: #00a65a;
    border-color: #008d4c;
}

.btn-success:hover,
.btn-success:active,
.btn-success.hover {
    background-color: #008d4c;
}

.btn-info {
    background-color: #00c0ef;
    border-color: #00acd6;
}

.btn-info:hover,
.btn-info:active,
.btn-info.hover {
    background-color: #00acd6;
}

.btn-danger {
    background-color: #dd4b39;
    border-color: #d73925;
}

.btn-danger:hover,
.btn-danger:active,
.btn-danger.hover {
    background-color: #d73925;
}

.btn-warning {
    background-color: #f39c12;
    border-color: #e08e0b;
}

.btn-warning:hover,
.btn-warning:active,
.btn-warning.hover {
    background-color: #e08e0b;
}

.btn-outline {
    border: 1px solid #fff;
    background: transparent;
    color: #fff;
}

.btn-outline:hover,
.btn-outline:focus,
.btn-outline:active {
    color: rgba(255, 255, 255, 0.7);
    border-color: rgba(255, 255, 255, 0.7);
}

.btn-link {
    -webkit-box-shadow: none;
    box-shadow: none;
}

.btn[class*='bg-']:hover {
    -webkit-box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 0 100px rgba(0, 0, 0, 0.2);
}

.btn-app {
    border-radius: 3px;
    position: relative;
    padding: 15px 5px;
    margin: 0 0 10px 10px;
    min-width: 80px;
    height: 60px;
    text-align: center;
    color: #666;
    border: 1px solid #ddd;
    background-color: #f4f4f4;
    font-size: 12px;
}

.btn-app > .fa,
.btn-app > .glyphicon,
.btn-app > .ion {
    font-size: 20px;
    display: block;
}

.btn-app:hover {
    background: #f4f4f4;
    color: #444;
    border-color: #aaa;
}

.btn-app:active,
.btn-app:focus {
    -webkit-box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
    box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
}

.btn-app > .badge {
    position: absolute;
    top: -3px;
    right: -10px;
    font-size: 10px;
    font-weight: 400;
}

/*
 * Component: Callout
 * ------------------
 */

.callout {
    border-radius: 3px;
    margin: 0 0 20px 0;
    padding: 15px 30px 15px 15px;
    border-left: 5px solid #eee;
}

.callout a {
    color: #fff;
    text-decoration: underline;
}

.callout a:hover {
    color: #eee;
}

.callout h4 {
    margin-top: 0;
    font-weight: 600;
}

.callout p:last-child {
    margin-bottom: 0;
}

.callout code,
.callout .highlight {
    background-color: #fff;
}

.callout.callout-danger {
    border-color: #c23321;
}

.callout.callout-warning {
    border-color: #c87f0a;
}

.callout.callout-info {
    border-color: #0097bc;
}

.callout.callout-success {
    border-color: #00733e;
}

/*
 * Component: alert
 * ----------------
 */

.alert {
    border-radius: 3px;
}

.alert h4 {
    font-weight: 600;
}

.alert .icon {
    margin-right: 10px;
}

.alert .close {
    color: #000;
    opacity: 0.2;
    filter: alpha(opacity=20);
}

.alert .close:hover {
    opacity: 0.5;
    filter: alpha(opacity=50);
}

.alert a {
    color: #fff;
    text-decoration: underline;
}

.alert-success {
    border-color: #008d4c;
}

.alert-danger,
.alert-error {
    border-color: #d73925;
}

.alert-warning {
    border-color: #e08e0b;
}

.alert-info {
    border-color: #00acd6;
}

/*
 * Component: Nav
 * --------------
 */

.nav > li > a:hover,
.nav > li > a:active,
.nav > li > a:focus {
    color: #444;
    background: #f7f7f7;
}

/* NAV PILLS */

.nav-pills > li > a {
    border-radius: 0;
    border-top: 3px solid transparent;
    color: #444;
}

.nav-pills > li > a > .fa,
.nav-pills > li > a > .glyphicon,
.nav-pills > li > a > .ion {
    margin-right: 5px;
}

.nav-pills > li.active > a,
.nav-pills > li.active > a:hover,
.nav-pills > li.active > a:focus {
    border-top-color: #3c8dbc;
}

.nav-pills > li.active > a {
    font-weight: 600;
}

/* NAV STACKED */

.nav-stacked > li > a {
    border-radius: 0;
    border-top: 0;
    border-left: 3px solid transparent;
    color: #444;
}

.nav-stacked > li.active > a,
.nav-stacked > li.active > a:hover {
    background: transparent;
    color: #444;
    border-top: 0;
    border-left-color: #3c8dbc;
}

.nav-stacked > li.header {
    border-bottom: 1px solid #ddd;
    color: #777;
    margin-bottom: 10px;
    padding: 5px 10px;
    text-transform: uppercase;
}

/* NAV TABS */

.nav-tabs-custom {
    margin-bottom: 20px;
    background: #fff;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    border-radius: 3px;
}

.nav-tabs-custom > .nav-tabs {
    margin: 0;
    border-bottom-color: #f4f4f4;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}

.nav-tabs-custom > .nav-tabs > li {
    border-top: 3px solid transparent;
    margin-bottom: -2px;
    margin-right: 5px;
}

.nav-tabs-custom > .nav-tabs > li.disabled > a {
    color: #777;
}

.nav-tabs-custom > .nav-tabs > li > a {
    color: #444;
    border-radius: 0;
}

.nav-tabs-custom > .nav-tabs > li > a.text-muted {
    color: #999;
}

.nav-tabs-custom > .nav-tabs > li > a,
.nav-tabs-custom > .nav-tabs > li > a:hover {
    background: transparent;
    margin: 0;
}

.nav-tabs-custom > .nav-tabs > li > a:hover {
    color: #999;
}

.nav-tabs-custom > .nav-tabs > li:not(.active) > a:hover,
.nav-tabs-custom > .nav-tabs > li:not(.active) > a:focus,
.nav-tabs-custom > .nav-tabs > li:not(.active) > a:active {
    border-color: transparent;
}

.nav-tabs-custom > .nav-tabs > li.active {
    border-top-color: #3c8dbc;
}

.nav-tabs-custom > .nav-tabs > li.active > a,
.nav-tabs-custom > .nav-tabs > li.active:hover > a {
    background-color: #fff;
    color: #444;
}

.nav-tabs-custom > .nav-tabs > li.active > a {
    border-top-color: transparent;
    border-left-color: #f4f4f4;
    border-right-color: #f4f4f4;
}

.nav-tabs-custom > .nav-tabs > li:first-of-type {
    margin-left: 0;
}

.nav-tabs-custom > .nav-tabs > li:first-of-type.active > a {
    border-left-color: transparent;
}

.nav-tabs-custom > .nav-tabs.pull-right {
    float: none !important;
}

.nav-tabs-custom > .nav-tabs.pull-right > li {
    float: right;
}

.nav-tabs-custom > .nav-tabs.pull-right > li:first-of-type {
    margin-right: 0;
}

.nav-tabs-custom > .nav-tabs.pull-right > li:first-of-type > a {
    border-left-width: 1px;
}

.nav-tabs-custom > .nav-tabs.pull-right > li:first-of-type.active > a {
    border-left-color: #f4f4f4;
    border-right-color: transparent;
}

.nav-tabs-custom > .nav-tabs > li.header {
    line-height: 35px;
    padding: 0 10px;
    font-size: 20px;
    color: #444;
}

.nav-tabs-custom > .nav-tabs > li.header > .fa,
.nav-tabs-custom > .nav-tabs > li.header > .glyphicon,
.nav-tabs-custom > .nav-tabs > li.header > .ion {
    margin-right: 5px;
}

.nav-tabs-custom > .tab-content {
    background: #fff;
    padding: 10px;
    border-bottom-right-radius: 3px;
    border-bottom-left-radius: 3px;
}

.nav-tabs-custom .dropdown.open > a:active,
.nav-tabs-custom .dropdown.open > a:focus {
    background: transparent;
    color: #999;
}

.nav-tabs-custom.tab-primary > .nav-tabs > li.active {
    border-top-color: #3c8dbc;
}

.nav-tabs-custom.tab-info > .nav-tabs > li.active {
    border-top-color: #00c0ef;
}

.nav-tabs-custom.tab-danger > .nav-tabs > li.active {
    border-top-color: #dd4b39;
}

.nav-tabs-custom.tab-warning > .nav-tabs > li.active {
    border-top-color: #f39c12;
}

.nav-tabs-custom.tab-success > .nav-tabs > li.active {
    border-top-color: #00a65a;
}

.nav-tabs-custom.tab-default > .nav-tabs > li.active {
    border-top-color: #d2d6de;
}

/* PAGINATION */

.pagination > li > a {
    background: #fafafa;
    color: #666;
}

.pagination.pagination-flat > li > a {
    border-radius: 0 !important;
}

/*
 * Component: Products List
 * ------------------------
 */

.products-list {
    list-style: none;
    margin: 0;
    padding: 0;
}

.products-list > .item {
    border-radius: 3px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    padding: 10px 0;
    background: #fff;
}

.products-list > .item:before,
.products-list > .item:after {
    content: " ";
    display: table;
}

.products-list > .item:after {
    clear: both;
}

.products-list .product-img {
    float: left;
}

.products-list .product-img img {
    width: 50px;
    height: 50px;
}

.products-list .product-info {
    margin-left: 60px;
}

.products-list .product-title {
    font-weight: 600;
}

.products-list .product-description {
    display: block;
    color: #999;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.product-list-in-box > .item {
    -webkit-box-shadow: none;
    box-shadow: none;
    border-radius: 0;
    border-bottom: 1px solid #f4f4f4;
}

.product-list-in-box > .item:last-of-type {
    border-bottom-width: 0;
}

/*
 * Component: Table
 * ----------------
 */

.table > thead > tr > th,
.table > tbody > tr > th,
.table > tfoot > tr > th,
.table > thead > tr > td,
.table > tbody > tr > td,
.table > tfoot > tr > td {
    border-top: 1px solid #f4f4f4;
}

.table > thead > tr > th {
    border-bottom: 2px solid #f4f4f4;
}

.table tr td .progress {
    margin-top: 5px;
}

.table-bordered {
    border: 1px solid #f4f4f4;
}

.table-bordered > thead > tr > th,
.table-bordered > tbody > tr > th,
.table-bordered > tfoot > tr > th,
.table-bordered > thead > tr > td,
.table-bordered > tbody > tr > td,
.table-bordered > tfoot > tr > td {
    border: 1px solid #f4f4f4;
}

.table-bordered > thead > tr > th,
.table-bordered > thead > tr > td {
    border-bottom-width: 2px;
}

.table.no-border,
.table.no-border td,
.table.no-border th {
    border: 0;
}

/* .text-center in tables */

table.text-center,
table.text-center td,
table.text-center th {
    text-align: center;
}

.table.align th {
    text-align: left;
}

.table.align td {
    text-align: right;
}

/*
 * Component: Label
 * ----------------
 */

.label-default {
    background-color: #d2d6de;
    color: #444;
}

/*
 * Component: Direct Chat
 * ----------------------
 */

.direct-chat .box-body {
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
    position: relative;
    overflow-x: hidden;
    padding: 0;
}

.direct-chat.chat-pane-open .direct-chat-contacts {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
}

.direct-chat-messages {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
    padding: 10px;
    height: 250px;
    overflow: auto;
}

.direct-chat-msg,
.direct-chat-text {
    display: block;
}

.direct-chat-msg {
    margin-bottom: 10px;
}

.direct-chat-msg:before,
.direct-chat-msg:after {
    content: " ";
    display: table;
}

.direct-chat-msg:after {
    clear: both;
}

.direct-chat-messages,
.direct-chat-contacts {
    -webkit-transition: -webkit-transform 0.5s ease-in-out;
    transition: -webkit-transform 0.5s ease-in-out;
    transition: transform 0.5s ease-in-out;
    transition: transform 0.5s ease-in-out, -webkit-transform 0.5s ease-in-out;
}

.direct-chat-text {
    border-radius: 5px;
    position: relative;
    padding: 5px 10px;
    background: #d2d6de;
    border: 1px solid #d2d6de;
    margin: 5px 0 0 50px;
    color: #444444;
}

.direct-chat-text:after,
.direct-chat-text:before {
    position: absolute;
    right: 100%;
    top: 15px;
    border: solid transparent;
    border-right-color: #d2d6de;
    content: ' ';
    height: 0;
    width: 0;
    pointer-events: none;
}

.direct-chat-text:after {
    border-width: 5px;
    margin-top: -5px;
}

.direct-chat-text:before {
    border-width: 6px;
    margin-top: -6px;
}

.right .direct-chat-text {
    margin-right: 50px;
    margin-left: 0;
}

.right .direct-chat-text:after,
.right .direct-chat-text:before {
    right: auto;
    left: 100%;
    border-right-color: transparent;
    border-left-color: #d2d6de;
}

.direct-chat-img {
    border-radius: 50%;
    float: left;
    width: 40px;
    height: 40px;
}

.right .direct-chat-img {
    float: right;
}

.direct-chat-info {
    display: block;
    margin-bottom: 2px;
    font-size: 12px;
}

.direct-chat-name {
    font-weight: 600;
}

.direct-chat-timestamp {
    color: #999;
}

.direct-chat-contacts-open .direct-chat-contacts {
    -webkit-transform: translate(0, 0);
    transform: translate(0, 0);
}

.direct-chat-contacts {
    -webkit-transform: translate(101%, 0);
    transform: translate(101%, 0);
    position: absolute;
    top: 0;
    bottom: 0;
    height: 250px;
    width: 100%;
    background: #222d32;
    color: #fff;
    overflow: auto;
}

.contacts-list > li {
    border-bottom: 1px solid rgba(0, 0, 0, 0.2);
    padding: 10px;
    margin: 0;
}

.contacts-list > li:before,
.contacts-list > li:after {
    content: " ";
    display: table;
}

.contacts-list > li:after {
    clear: both;
}

.contacts-list > li:last-of-type {
    border-bottom: none;
}

.contacts-list-img {
    border-radius: 50%;
    width: 40px;
    float: left;
}

.contacts-list-info {
    margin-left: 45px;
    color: #fff;
}

.contacts-list-name,
.contacts-list-status {
    display: block;
}

.contacts-list-name {
    font-weight: 600;
}

.contacts-list-status {
    font-size: 12px;
}

.contacts-list-date {
    color: #aaa;
    font-weight: normal;
}

.contacts-list-msg {
    color: #999;
}

.direct-chat-danger .right > .direct-chat-text {
    background: #dd4b39;
    border-color: #dd4b39;
    color: #ffffff;
}

.direct-chat-danger .right > .direct-chat-text:after,
.direct-chat-danger .right > .direct-chat-text:before {
    border-left-color: #dd4b39;
}

.direct-chat-primary .right > .direct-chat-text {
    background: #3c8dbc;
    border-color: #3c8dbc;
    color: #ffffff;
}

.direct-chat-primary .right > .direct-chat-text:after,
.direct-chat-primary .right > .direct-chat-text:before {
    border-left-color: #3c8dbc;
}

.direct-chat-warning .right > .direct-chat-text {
    background: #f39c12;
    border-color: #f39c12;
    color: #ffffff;
}

.direct-chat-warning .right > .direct-chat-text:after,
.direct-chat-warning .right > .direct-chat-text:before {
    border-left-color: #f39c12;
}

.direct-chat-info .right > .direct-chat-text {
    background: #00c0ef;
    border-color: #00c0ef;
    color: #ffffff;
}

.direct-chat-info .right > .direct-chat-text:after,
.direct-chat-info .right > .direct-chat-text:before {
    border-left-color: #00c0ef;
}

.direct-chat-success .right > .direct-chat-text {
    background: #00a65a;
    border-color: #00a65a;
    color: #ffffff;
}

.direct-chat-success .right > .direct-chat-text:after,
.direct-chat-success .right > .direct-chat-text:before {
    border-left-color: #00a65a;
}

/*
 * Component: Users List
 * ---------------------
 */

.users-list > li {
    width: 25%;
    float: left;
    padding: 10px;
    text-align: center;
}

.users-list > li img {
    border-radius: 50%;
    max-width: 100%;
    height: auto;
}

.users-list > li > a:hover,
.users-list > li > a:hover .users-list-name {
    color: #999;
}

.users-list-name,
.users-list-date {
    display: block;
}

.users-list-name {
    font-weight: 600;
    color: #444;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
}

.users-list-date {
    color: #999;
    font-size: 12px;
}

/*
 * Component: Carousel
 * -------------------
 */

.carousel-control.left,
.carousel-control.right {
    background-image: none;
}

.carousel-control > .fa {
    font-size: 40px;
    position: absolute;
    top: 50%;
    z-index: 5;
    display: inline-block;
    margin-top: -20px;
}

/*
 * Component: modal
 * ----------------
 */

.modal {
    background: rgba(0, 0, 0, 0.3);
}

.modal-content {
    border-radius: 0;
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
    border: 0;
}

@media (min-width: 768px) {
    .modal-content {
        -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
        box-shadow: 0 2px 3px rgba(0, 0, 0, 0.125);
    }
}

.modal-header {
    border-bottom-color: #f4f4f4;
}

.modal-footer {
    border-top-color: #f4f4f4;
}

.modal-primary .modal-header,
.modal-primary .modal-footer {
    border-color: #307095;
}

.modal-warning .modal-header,
.modal-warning .modal-footer {
    border-color: #c87f0a;
}

.modal-info .modal-header,
.modal-info .modal-footer {
    border-color: #0097bc;
}

.modal-success .modal-header,
.modal-success .modal-footer {
    border-color: #00733e;
}

.modal-danger .modal-header,
.modal-danger .modal-footer {
    border-color: #c23321;
}

/*
 * Component: Social Widgets
 * -------------------------
 */

.box-widget {
    border: none;
    position: relative;
}

.widget-user .widget-user-header {
    padding: 20px;
    height: 120px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}

.widget-user .widget-user-username {
    margin-top: 0;
    margin-bottom: 5px;
    font-size: 25px;
    font-weight: 300;
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.2);
}

.widget-user .widget-user-desc {
    margin-top: 0;
}

.widget-user .widget-user-image {
    position: absolute;
    top: 65px;
    left: 50%;
    margin-left: -45px;
}

.widget-user .widget-user-image > img {
    width: 90px;
    height: auto;
    border: 3px solid #fff;
}

.widget-user .box-footer {
    padding-top: 30px;
}

.widget-user-2 .widget-user-header {
    padding: 20px;
    border-top-right-radius: 3px;
    border-top-left-radius: 3px;
}

.widget-user-2 .widget-user-username {
    margin-top: 5px;
    margin-bottom: 5px;
    font-size: 25px;
    font-weight: 300;
}

.widget-user-2 .widget-user-desc {
    margin-top: 0;
}

.widget-user-2 .widget-user-username,
.widget-user-2 .widget-user-desc {
    margin-left: 75px;
}

.widget-user-2 .widget-user-image > img {
    width: 65px;
    height: auto;
    float: left;
}

.treeview-menu {
    display: none;
    list-style: none;
    padding: 0;
    margin: 0;
    padding-left: 5px;
}

.treeview-menu .treeview-menu {
    padding-left: 20px;
}

.treeview-menu > li {
    margin: 0;
}

.treeview-menu > li > a {
    padding: 5px 5px 5px 15px;
    display: block;
    font-size: 14px;
}

.treeview-menu > li > a > .fa,
.treeview-menu > li > a > .glyphicon,
.treeview-menu > li > a > .ion {
    width: 20px;
}

.treeview-menu > li > a > .pull-right-container > .fa-angle-left,
.treeview-menu > li > a > .pull-right-container > .fa-angle-down,
.treeview-menu > li > a > .fa-angle-left,
.treeview-menu > li > a > .fa-angle-down {
    width: auto;
}

/*
 * Page: Mailbox
 * -------------
 */

.mailbox-messages > .table {
    margin: 0;
}

.mailbox-controls {
    padding: 5px;
}

.mailbox-controls.with-border {
    border-bottom: 1px solid #f4f4f4;
}

.mailbox-read-info {
    border-bottom: 1px solid #f4f4f4;
    padding: 10px;
}

.mailbox-read-info h3 {
    font-size: 20px;
    margin: 0;
}

.mailbox-read-info h5 {
    margin: 0;
    padding: 5px 0 0 0;
}

.mailbox-read-time {
    color: #999;
    font-size: 13px;
}

.mailbox-read-message {
    padding: 10px;
}

.mailbox-attachments li {
    float: left;
    width: 200px;
    border: 1px solid #eee;
    margin-bottom: 10px;
    margin-right: 10px;
}

.mailbox-attachment-name {
    font-weight: bold;
    color: #666;
}

.mailbox-attachment-icon,
.mailbox-attachment-info,
.mailbox-attachment-size {
    display: block;
}

.mailbox-attachment-info {
    padding: 10px;
    background: #f4f4f4;
}

.mailbox-attachment-size {
    color: #999;
    font-size: 12px;
}

.mailbox-attachment-icon {
    text-align: center;
    font-size: 65px;
    color: #666;
    padding: 20px 10px;
}

.mailbox-attachment-icon.has-img {
    padding: 0;
}

.mailbox-attachment-icon.has-img > img {
    max-width: 100%;
    height: auto;
}

/*
 * Page: Lock Screen
 * -----------------
 */

/* ADD THIS CLASS TO THE <BODY> TAG */

.lockscreen {
    background: #d2d6de;
}

.lockscreen-logo {
    font-size: 35px;
    text-align: center;
    margin-bottom: 25px;
    font-weight: 300;
}

.lockscreen-logo a {
    color: #444;
}

.lockscreen-wrapper {
    max-width: 400px;
    margin: 0 auto;
    margin-top: 10%;
}

/* User name [optional] */

.lockscreen .lockscreen-name {
    text-align: center;
    font-weight: 600;
}

/* Will contain the image and the sign in form */

.lockscreen-item {
    border-radius: 4px;
    padding: 0;
    background: #fff;
    position: relative;
    margin: 10px auto 30px auto;
    width: 290px;
}

/* User image */

.lockscreen-image {
    border-radius: 50%;
    position: absolute;
    left: -10px;
    top: -25px;
    background: #fff;
    padding: 5px;
    z-index: 10;
}

.lockscreen-image > img {
    border-radius: 50%;
    width: 70px;
    height: 70px;
}

/* Contains the password input and the login button */

.lockscreen-credentials {
    margin-left: 70px;
}

.lockscreen-credentials .form-control {
    border: 0;
}

.lockscreen-credentials .btn {
    background-color: #fff;
    border: 0;
    padding: 0 10px;
}

.lockscreen-footer {
    margin-top: 10px;
}

/*
 * Page: Login & Register
 * ----------------------
 */

.login-logo,
.register-logo {
    font-size: 35px;
    text-align: center;
    margin-bottom: 25px;
    font-weight: 300;
}

.login-logo a,
.register-logo a {
    color: #444;
}

.login-page,
.register-page {
    background: #d2d6de;
}

.login-box,
.register-box {
    width: 360px;
    margin: 7% auto;
}

@media (max-width: 768px) {
    .login-box,
    .register-box {
        width: 90%;
        margin-top: 20px;
    }
}

.login-box-body,
.register-box-body {
    background: #fff;
    padding: 20px;
    border-top: 0;
    color: #666;
}

.login-box-body .form-control-feedback,
.register-box-body .form-control-feedback {
    color: #777;
}

.login-box-msg,
.register-box-msg {
    margin: 0;
    text-align: center;
    padding: 0 20px 20px 20px;
}

.social-auth-links {
    margin: 10px 0;
}

/*
 * Page: 400 and 500 error pages
 * ------------------------------
 */

.error-page {
    width: 600px;
    margin: 20px auto 0 auto;
}

@media (max-width: 991px) {
    .error-page {
        width: 100%;
    }
}

.error-page > .headline {
    float: left;
    font-size: 100px;
    font-weight: 300;
}

@media (max-width: 991px) {
    .error-page > .headline {
        float: none;
        text-align: center;
    }
}

.error-page > .error-content {
    margin-left: 190px;
    display: block;
}

@media (max-width: 991px) {
    .error-page > .error-content {
        margin-left: 0;
    }
}

.error-page > .error-content > h3 {
    font-weight: 300;
    font-size: 25px;
}

@media (max-width: 991px) {
    .error-page > .error-content > h3 {
        text-align: center;
    }
}

/*
 * Page: Invoice
 * -------------
 */

.invoice {
    position: relative;
    background: #fff;
    border: 1px solid #f4f4f4;
    padding: 20px;
    margin: 10px 25px;
}

.invoice-title {
    margin-top: 0;
}

/*
 * Page: Profile
 * -------------
 */

.profile-user-img {
    margin: 0 auto;
    width: 100px;
    padding: 3px;
    border: 3px solid #d2d6de;
}

.profile-username {
    font-size: 21px;
    margin-top: 5px;
}

.post {
    border-bottom: 1px solid #d2d6de;
    margin-bottom: 15px;
    padding-bottom: 15px;
    color: #666;
}

.post:last-of-type {
    border-bottom: 0;
    margin-bottom: 0;
    padding-bottom: 0;
}

.post .user-block {
    margin-bottom: 15px;
}

/*
 * Social Buttons for Bootstrap
 *
 * Copyright 2013-2015 Panayiotis Lipiridis
 * Licensed under the MIT License
 *
 * https://github.com/lipis/bootstrap-social
 */

.btn-social {
    position: relative;
    padding-left: 44px;
    text-align: left;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}

.btn-social > :first-child {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 32px;
    line-height: 34px;
    font-size: 1.6em;
    text-align: center;
    border-right: 1px solid rgba(0, 0, 0, 0.2);
}

.btn-social.btn-lg {
    padding-left: 61px;
}

.btn-social.btn-lg > :first-child {
    line-height: 45px;
    width: 45px;
    font-size: 1.8em;
}

.btn-social.btn-sm {
    padding-left: 38px;
}

.btn-social.btn-sm > :first-child {
    line-height: 28px;
    width: 28px;
    font-size: 1.4em;
}

.btn-social.btn-xs {
    padding-left: 30px;
}

.btn-social.btn-xs > :first-child {
    line-height: 20px;
    width: 20px;
    font-size: 1.2em;
}

.btn-social-icon {
    position: relative;
    padding-left: 44px;
    text-align: left;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    height: 34px;
    width: 34px;
    padding: 0;
}

.btn-social-icon > :first-child {
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 32px;
    line-height: 34px;
    font-size: 1.6em;
    text-align: center;
    border-right: 1px solid rgba(0, 0, 0, 0.2);
}

.btn-social-icon.btn-lg {
    padding-left: 61px;
}

.btn-social-icon.btn-lg > :first-child {
    line-height: 45px;
    width: 45px;
    font-size: 1.8em;
}

.btn-social-icon.btn-sm {
    padding-left: 38px;
}

.btn-social-icon.btn-sm > :first-child {
    line-height: 28px;
    width: 28px;
    font-size: 1.4em;
}

.btn-social-icon.btn-xs {
    padding-left: 30px;
}

.btn-social-icon.btn-xs > :first-child {
    line-height: 20px;
    width: 20px;
    font-size: 1.2em;
}

.btn-social-icon > :first-child {
    border: none;
    text-align: center;
    width: 100%;
}

.btn-social-icon.btn-lg {
    height: 45px;
    width: 45px;
    padding-left: 0;
    padding-right: 0;
}

.btn-social-icon.btn-sm {
    height: 30px;
    width: 30px;
    padding-left: 0;
    padding-right: 0;
}

.btn-social-icon.btn-xs {
    height: 22px;
    width: 22px;
    padding-left: 0;
    padding-right: 0;
}

.btn-adn {
    color: #ffffff;
    background-color: #d87a68;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-adn:focus,
.btn-adn.focus {
    color: #ffffff;
    background-color: #ce563f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-adn:hover {
    color: #ffffff;
    background-color: #ce563f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-adn:active,
.btn-adn.active,
.open > .dropdown-toggle.btn-adn {
    color: #ffffff;
    background-color: #ce563f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-adn:active,
.btn-adn.active,
.open > .dropdown-toggle.btn-adn {
    background-image: none;
}

.btn-adn .badge {
    color: #d87a68;
    background-color: #ffffff;
}

.btn-bitbucket {
    color: #ffffff;
    background-color: #205081;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-bitbucket:focus,
.btn-bitbucket.focus {
    color: #ffffff;
    background-color: #163758;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-bitbucket:hover {
    color: #ffffff;
    background-color: #163758;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-bitbucket:active,
.btn-bitbucket.active,
.open > .dropdown-toggle.btn-bitbucket {
    color: #ffffff;
    background-color: #163758;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-bitbucket:active,
.btn-bitbucket.active,
.open > .dropdown-toggle.btn-bitbucket {
    background-image: none;
}

.btn-bitbucket .badge {
    color: #205081;
    background-color: #ffffff;
}

.btn-dropbox {
    color: #ffffff;
    background-color: #1087dd;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-dropbox:focus,
.btn-dropbox.focus {
    color: #ffffff;
    background-color: #0d6aad;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-dropbox:hover {
    color: #ffffff;
    background-color: #0d6aad;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-dropbox:active,
.btn-dropbox.active,
.open > .dropdown-toggle.btn-dropbox {
    color: #ffffff;
    background-color: #0d6aad;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-dropbox:active,
.btn-dropbox.active,
.open > .dropdown-toggle.btn-dropbox {
    background-image: none;
}

.btn-dropbox .badge {
    color: #1087dd;
    background-color: #ffffff;
}

.btn-facebook {
    color: #ffffff;
    background-color: #3b5998;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-facebook:focus,
.btn-facebook.focus {
    color: #ffffff;
    background-color: #2d4373;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-facebook:hover {
    color: #ffffff;
    background-color: #2d4373;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-facebook:active,
.btn-facebook.active,
.open > .dropdown-toggle.btn-facebook {
    color: #ffffff;
    background-color: #2d4373;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-facebook:active,
.btn-facebook.active,
.open > .dropdown-toggle.btn-facebook {
    background-image: none;
}

.btn-facebook .badge {
    color: #3b5998;
    background-color: #ffffff;
}

.btn-flickr {
    color: #ffffff;
    background-color: #ff0084;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-flickr:focus,
.btn-flickr.focus {
    color: #ffffff;
    background-color: #cc006a;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-flickr:hover {
    color: #ffffff;
    background-color: #cc006a;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-flickr:active,
.btn-flickr.active,
.open > .dropdown-toggle.btn-flickr {
    color: #ffffff;
    background-color: #cc006a;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-flickr:active,
.btn-flickr.active,
.open > .dropdown-toggle.btn-flickr {
    background-image: none;
}

.btn-flickr .badge {
    color: #ff0084;
    background-color: #ffffff;
}

.btn-foursquare {
    color: #ffffff;
    background-color: #f94877;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-foursquare:focus,
.btn-foursquare.focus {
    color: #ffffff;
    background-color: #f71752;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-foursquare:hover {
    color: #ffffff;
    background-color: #f71752;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-foursquare:active,
.btn-foursquare.active,
.open > .dropdown-toggle.btn-foursquare {
    color: #ffffff;
    background-color: #f71752;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-foursquare:active,
.btn-foursquare.active,
.open > .dropdown-toggle.btn-foursquare {
    background-image: none;
}

.btn-foursquare .badge {
    color: #f94877;
    background-color: #ffffff;
}

.btn-github {
    color: #ffffff;
    background-color: #444444;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-github:focus,
.btn-github.focus {
    color: #ffffff;
    background-color: #2b2b2b;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-github:hover {
    color: #ffffff;
    background-color: #2b2b2b;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-github:active,
.btn-github.active,
.open > .dropdown-toggle.btn-github {
    color: #ffffff;
    background-color: #2b2b2b;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-github:active,
.btn-github.active,
.open > .dropdown-toggle.btn-github {
    background-image: none;
}

.btn-github .badge {
    color: #444444;
    background-color: #ffffff;
}

.btn-google {
    color: #ffffff;
    background-color: #dd4b39;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-google:focus,
.btn-google.focus {
    color: #ffffff;
    background-color: #c23321;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-google:hover {
    color: #ffffff;
    background-color: #c23321;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-google:active,
.btn-google.active,
.open > .dropdown-toggle.btn-google {
    color: #ffffff;
    background-color: #c23321;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-google:active,
.btn-google.active,
.open > .dropdown-toggle.btn-google {
    background-image: none;
}

.btn-google .badge {
    color: #dd4b39;
    background-color: #ffffff;
}

.btn-instagram {
    color: #ffffff;
    background-color: #3f729b;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-instagram:focus,
.btn-instagram.focus {
    color: #ffffff;
    background-color: #305777;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-instagram:hover {
    color: #ffffff;
    background-color: #305777;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-instagram:active,
.btn-instagram.active,
.open > .dropdown-toggle.btn-instagram {
    color: #ffffff;
    background-color: #305777;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-instagram:active,
.btn-instagram.active,
.open > .dropdown-toggle.btn-instagram {
    background-image: none;
}

.btn-instagram .badge {
    color: #3f729b;
    background-color: #ffffff;
}

.btn-linkedin {
    color: #ffffff;
    background-color: #007bb6;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-linkedin:focus,
.btn-linkedin.focus {
    color: #ffffff;
    background-color: #005983;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-linkedin:hover {
    color: #ffffff;
    background-color: #005983;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-linkedin:active,
.btn-linkedin.active,
.open > .dropdown-toggle.btn-linkedin {
    color: #ffffff;
    background-color: #005983;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-linkedin:active,
.btn-linkedin.active,
.open > .dropdown-toggle.btn-linkedin {
    background-image: none;
}

.btn-linkedin .badge {
    color: #007bb6;
    background-color: #ffffff;
}

.btn-microsoft {
    color: #ffffff;
    background-color: #2672ec;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-microsoft:focus,
.btn-microsoft.focus {
    color: #ffffff;
    background-color: #125acd;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-microsoft:hover {
    color: #ffffff;
    background-color: #125acd;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-microsoft:active,
.btn-microsoft.active,
.open > .dropdown-toggle.btn-microsoft {
    color: #ffffff;
    background-color: #125acd;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-microsoft:active,
.btn-microsoft.active,
.open > .dropdown-toggle.btn-microsoft {
    background-image: none;
}

.btn-microsoft .badge {
    color: #2672ec;
    background-color: #ffffff;
}

.btn-openid {
    color: #ffffff;
    background-color: #f7931e;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-openid:focus,
.btn-openid.focus {
    color: #ffffff;
    background-color: #da7908;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-openid:hover {
    color: #ffffff;
    background-color: #da7908;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-openid:active,
.btn-openid.active,
.open > .dropdown-toggle.btn-openid {
    color: #ffffff;
    background-color: #da7908;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-openid:active,
.btn-openid.active,
.open > .dropdown-toggle.btn-openid {
    background-image: none;
}

.btn-openid .badge {
    color: #f7931e;
    background-color: #ffffff;
}

.btn-pinterest {
    color: #ffffff;
    background-color: #cb2027;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-pinterest:focus,
.btn-pinterest.focus {
    color: #ffffff;
    background-color: #9f191f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-pinterest:hover {
    color: #ffffff;
    background-color: #9f191f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-pinterest:active,
.btn-pinterest.active,
.open > .dropdown-toggle.btn-pinterest {
    color: #ffffff;
    background-color: #9f191f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-pinterest:active,
.btn-pinterest.active,
.open > .dropdown-toggle.btn-pinterest {
    background-image: none;
}

.btn-pinterest .badge {
    color: #cb2027;
    background-color: #ffffff;
}

.btn-reddit {
    color: #000000;
    background-color: #eff7ff;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-reddit:focus,
.btn-reddit.focus {
    color: #000000;
    background-color: #bcddff;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-reddit:hover {
    color: #000000;
    background-color: #bcddff;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-reddit:active,
.btn-reddit.active,
.open > .dropdown-toggle.btn-reddit {
    color: #000000;
    background-color: #bcddff;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-reddit:active,
.btn-reddit.active,
.open > .dropdown-toggle.btn-reddit {
    background-image: none;
}

.btn-reddit .badge {
    color: #eff7ff;
    background-color: #000000;
}

.btn-soundcloud {
    color: #ffffff;
    background-color: #ff5500;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-soundcloud:focus,
.btn-soundcloud.focus {
    color: #ffffff;
    background-color: #cc4400;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-soundcloud:hover {
    color: #ffffff;
    background-color: #cc4400;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-soundcloud:active,
.btn-soundcloud.active,
.open > .dropdown-toggle.btn-soundcloud {
    color: #ffffff;
    background-color: #cc4400;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-soundcloud:active,
.btn-soundcloud.active,
.open > .dropdown-toggle.btn-soundcloud {
    background-image: none;
}

.btn-soundcloud .badge {
    color: #ff5500;
    background-color: #ffffff;
}

.btn-tumblr {
    color: #ffffff;
    background-color: #2c4762;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-tumblr:focus,
.btn-tumblr.focus {
    color: #ffffff;
    background-color: #1c2d3f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-tumblr:hover {
    color: #ffffff;
    background-color: #1c2d3f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-tumblr:active,
.btn-tumblr.active,
.open > .dropdown-toggle.btn-tumblr {
    color: #ffffff;
    background-color: #1c2d3f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-tumblr:active,
.btn-tumblr.active,
.open > .dropdown-toggle.btn-tumblr {
    background-image: none;
}

.btn-tumblr .badge {
    color: #2c4762;
    background-color: #ffffff;
}

.btn-twitter {
    color: #ffffff;
    background-color: #55acee;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-twitter:focus,
.btn-twitter.focus {
    color: #ffffff;
    background-color: #2795e9;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-twitter:hover {
    color: #ffffff;
    background-color: #2795e9;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-twitter:active,
.btn-twitter.active,
.open > .dropdown-toggle.btn-twitter {
    color: #ffffff;
    background-color: #2795e9;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-twitter:active,
.btn-twitter.active,
.open > .dropdown-toggle.btn-twitter {
    background-image: none;
}

.btn-twitter .badge {
    color: #55acee;
    background-color: #ffffff;
}

.btn-vimeo {
    color: #ffffff;
    background-color: #1ab7ea;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-vimeo:focus,
.btn-vimeo.focus {
    color: #ffffff;
    background-color: #1295bf;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-vimeo:hover {
    color: #ffffff;
    background-color: #1295bf;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-vimeo:active,
.btn-vimeo.active,
.open > .dropdown-toggle.btn-vimeo {
    color: #ffffff;
    background-color: #1295bf;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-vimeo:active,
.btn-vimeo.active,
.open > .dropdown-toggle.btn-vimeo {
    background-image: none;
}

.btn-vimeo .badge {
    color: #1ab7ea;
    background-color: #ffffff;
}

.btn-vk {
    color: #ffffff;
    background-color: #587ea3;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-vk:focus,
.btn-vk.focus {
    color: #ffffff;
    background-color: #466482;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-vk:hover {
    color: #ffffff;
    background-color: #466482;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-vk:active,
.btn-vk.active,
.open > .dropdown-toggle.btn-vk {
    color: #ffffff;
    background-color: #466482;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-vk:active,
.btn-vk.active,
.open > .dropdown-toggle.btn-vk {
    background-image: none;
}

.btn-vk .badge {
    color: #587ea3;
    background-color: #ffffff;
}

.btn-yahoo {
    color: #ffffff;
    background-color: #720e9e;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-yahoo:focus,
.btn-yahoo.focus {
    color: #ffffff;
    background-color: #500a6f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-yahoo:hover {
    color: #ffffff;
    background-color: #500a6f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-yahoo:active,
.btn-yahoo.active,
.open > .dropdown-toggle.btn-yahoo {
    color: #ffffff;
    background-color: #500a6f;
    border-color: rgba(0, 0, 0, 0.2);
}

.btn-yahoo:active,
.btn-yahoo.active,
.open > .dropdown-toggle.btn-yahoo {
    background-image: none;
}

.btn-yahoo .badge {
    color: #720e9e;
    background-color: #ffffff;
}

/*
 * Plugin: Full Calendar
 * ---------------------
 */

.fc-button {
    background: #f4f4f4;
    background-image: none;
    color: #444;
    border-color: #ddd;
    border-bottom-color: #ddd;
}

.fc-button:hover,
.fc-button:active,
.fc-button.hover {
    background-color: #e9e9e9;
}

.fc-header-title h2 {
    font-size: 15px;
    line-height: 1.6em;
    color: #666;
    margin-left: 10px;
}

.fc-header-right {
    padding-right: 10px;
}

.fc-header-left {
    padding-left: 10px;
}

.fc-widget-header {
    background: #fafafa;
}

.fc-grid {
    width: 100%;
    border: 0;
}

.fc-widget-header:first-of-type,
.fc-widget-content:first-of-type {
    border-left: 0;
    border-right: 0;
}

.fc-widget-header:last-of-type,
.fc-widget-content:last-of-type {
    border-right: 0;
}

.fc-toolbar {
    padding: 10px;
    margin: 0;
}

.fc-day-number {
    font-size: 20px;
    font-weight: 300;
    padding-right: 10px;
}

.fc-color-picker {
    list-style: none;
    margin: 0;
    padding: 0;
}

.fc-color-picker > li {
    float: left;
    font-size: 30px;
    margin-right: 5px;
    line-height: 30px;
}

.fc-color-picker > li .fa {
    -webkit-transition: -webkit-transform linear 0.3s;
    transition: -webkit-transform linear 0.3s;
    transition: transform linear 0.3s;
    transition: transform linear 0.3s, -webkit-transform linear 0.3s;
}

.fc-color-picker > li .fa:hover {
    -webkit-transform: rotate(30deg);
    transform: rotate(30deg);
}

#add-new-event {
    -webkit-transition: all linear 0.3s;
    transition: all linear 0.3s;
}

.external-event {
    padding: 5px 10px;
    font-weight: bold;
    margin-bottom: 4px;
    -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    border-radius: 3px;
    cursor: move;
}

.external-event:hover {
    -webkit-box-shadow: inset 0 0 90px rgba(0, 0, 0, 0.2);
    box-shadow: inset 0 0 90px rgba(0, 0, 0, 0.2);
}

/*
 * Plugin: Select2
 * ---------------
 */

.select2-container--default.select2-container--focus,
.select2-selection.select2-container--focus,
.select2-container--default:focus,
.select2-selection:focus,
.select2-container--default:active,
.select2-selection:active {
    outline: none;
}

.select2-container--default .select2-selection--single,
.select2-selection .select2-selection--single {
    border: 1px solid #d2d6de;
    border-radius: 0;
    padding: 6px 12px;
    height: 34px;
}

.select2-container--default.select2-container--open {
    border-color: #3c8dbc;
}

.select2-dropdown {
    border: 1px solid #d2d6de;
    border-radius: 0;
}

.select2-container--default .select2-results__option--highlighted[aria-selected] {
    background-color: #3c8dbc;
    color: white;
}

.select2-results__option {
    padding: 6px 12px;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-user-select: none;
}

.select2-container .select2-selection--single .select2-selection__rendered {
    padding-left: 0;
    padding-right: 0;
    height: auto;
    margin-top: -4px;
}

.select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered {
    padding-right: 6px;
    padding-left: 20px;
}

.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 28px;
    right: 3px;
}

.select2-container--default .select2-selection--single .select2-selection__arrow b {
    margin-top: 0;
}

.select2-dropdown .select2-search__field,
.select2-search--inline .select2-search__field {
    border: 1px solid #d2d6de;
}

.select2-dropdown .select2-search__field:focus,
.select2-search--inline .select2-search__field:focus {
    outline: none;
}

.select2-container--default.select2-container--focus .select2-selection--multiple,
.select2-container--default .select2-search--dropdown .select2-search__field {
    border-color: #3c8dbc !important;
}

.select2-container--default .select2-results__option[aria-disabled=true] {
    color: #999;
}

.select2-container--default .select2-results__option[aria-selected=true] {
    background-color: #ddd;
}

.select2-container--default .select2-results__option[aria-selected=true],
.select2-container--default .select2-results__option[aria-selected=true]:hover {
    color: #444;
}

.select2-container--default .select2-selection--multiple {
    border: 1px solid #d2d6de;
    border-radius: 0;
}

.select2-container--default .select2-selection--multiple:focus {
    border-color: #3c8dbc;
}

.select2-container--default.select2-container--focus .select2-selection--multiple {
    border-color: #d2d6de;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice {
    background-color: #3c8dbc;
    border-color: #367fa9;
    padding: 1px 10px;
    color: #fff;
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
    margin-right: 5px;
    color: rgba(255, 255, 255, 0.7);
}

.select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
    color: #fff;
}

.select2-container .select2-selection--single .select2-selection__rendered {
    padding-right: 10px;
}

.box .datepicker-inline,
.box .datepicker-inline .datepicker-days,
.box .datepicker-inline > table,
.box .datepicker-inline .datepicker-days > table {
    width: 100%;
}

.box .datepicker-inline td:hover,
.box .datepicker-inline .datepicker-days td:hover,
.box .datepicker-inline > table td:hover,
.box .datepicker-inline .datepicker-days > table td:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

.box .datepicker-inline td.day.old,
.box .datepicker-inline .datepicker-days td.day.old,
.box .datepicker-inline > table td.day.old,
.box .datepicker-inline .datepicker-days > table td.day.old,
.box .datepicker-inline td.day.new,
.box .datepicker-inline .datepicker-days td.day.new,
.box .datepicker-inline > table td.day.new,
.box .datepicker-inline .datepicker-days > table td.day.new {
    color: #777;
}

/*
 * General: Miscellaneous
 * ----------------------
 */

.pad {
    padding: 10px;
}

.margin {
    margin: 10px;
}

.margin-bottom {
    margin-bottom: 20px;
}

.margin-bottom-none {
    margin-bottom: 0;
}

.margin-r-5 {
    margin-right: 5px;
}

.inline {
    display: inline;
}

.description-block {
    display: block;
    margin: 10px 0;
    text-align: center;
}

.description-block.margin-bottom {
    margin-bottom: 25px;
}

.description-block > .description-header {
    margin: 0;
    padding: 0;
    font-weight: 600;
    font-size: 16px;
}

.description-block > .description-text {
    text-transform: uppercase;
}

.bg-red,
.bg-yellow,
.bg-aqua,
.bg-blue,
.bg-light-blue,
.bg-green,
.bg-navy,
.bg-teal,
.bg-olive,
.bg-lime,
.bg-orange,
.bg-fuchsia,
.bg-purple,
.bg-maroon,
.bg-black,
.bg-red-active,
.bg-yellow-active,
.bg-aqua-active,
.bg-blue-active,
.bg-light-blue-active,
.bg-green-active,
.bg-navy-active,
.bg-teal-active,
.bg-olive-active,
.bg-lime-active,
.bg-orange-active,
.bg-fuchsia-active,
.bg-purple-active,
.bg-maroon-active,
.bg-black-active,
.callout.callout-danger,
.callout.callout-warning,
.callout.callout-info,
.callout.callout-success,
.alert-success,
.alert-danger,
.alert-error,
.alert-warning,
.alert-info,
.label-danger,
.label-info,
.label-warning,
.label-primary,
.label-success,
.modal-primary .modal-body,
.modal-primary .modal-header,
.modal-primary .modal-footer,
.modal-warning .modal-body,
.modal-warning .modal-header,
.modal-warning .modal-footer,
.modal-info .modal-body,
.modal-info .modal-header,
.modal-info .modal-footer,
.modal-success .modal-body,
.modal-success .modal-header,
.modal-success .modal-footer,
.modal-danger .modal-body,
.modal-danger .modal-header,
.modal-danger .modal-footer {
    color: #fff !important;
}

.bg-gray {
    color: #000;
    background-color: #d2d6de !important;
}

.bg-gray-light {
    background-color: #f7f7f7;
}

.bg-black {
    background-color: #111111 !important;
}

.bg-red,
.callout.callout-danger,
.alert-danger,
.alert-error,
.label-danger,
.modal-danger .modal-body {
    background-color: #dd4b39 !important;
}

.bg-yellow,
.callout.callout-warning,
.alert-warning,
.label-warning,
.modal-warning .modal-body {
    background-color: #f39c12 !important;
}

.bg-aqua,
.callout.callout-info,
.alert-info,
.label-info,
.modal-info .modal-body {
    background-color: #00c0ef !important;
}

.bg-blue {
    background-color: #0073b7 !important;
}

.bg-light-blue,
.label-primary,
.modal-primary .modal-body {
    background-color: #3c8dbc !important;
}

.bg-green,
.callout.callout-success,
.alert-success,
.label-success,
.modal-success .modal-body {
    background-color: #00a65a !important;
}

.bg-navy {
    background-color: #001f3f !important;
}

.bg-teal {
    background-color: #39cccc !important;
}

.bg-olive {
    background-color: #3d9970 !important;
}

.bg-lime {
    background-color: #01ff70 !important;
}

.bg-orange {
    background-color: #ff851b !important;
}

.bg-fuchsia {
    background-color: #f012be !important;
}

.bg-purple {
    background-color: #605ca8 !important;
}

.bg-maroon {
    background-color: #d81b60 !important;
}

.bg-gray-active {
    color: #000;
    background-color: #b5bbc8 !important;
}

.bg-black-active {
    background-color: #000000 !important;
}

.bg-red-active,
.modal-danger .modal-header,
.modal-danger .modal-footer {
    background-color: #d33724 !important;
}

.bg-yellow-active,
.modal-warning .modal-header,
.modal-warning .modal-footer {
    background-color: #db8b0b !important;
}

.bg-aqua-active,
.modal-info .modal-header,
.modal-info .modal-footer {
    background-color: #00a7d0 !important;
}

.bg-blue-active {
    background-color: #005384 !important;
}

.bg-light-blue-active,
.modal-primary .modal-header,
.modal-primary .modal-footer {
    background-color: #357ca5 !important;
}

.bg-green-active,
.modal-success .modal-header,
.modal-success .modal-footer {
    background-color: #008d4c !important;
}

.bg-navy-active {
    background-color: #001a35 !important;
}

.bg-teal-active {
    background-color: #30bbbb !important;
}

.bg-olive-active {
    background-color: #368763 !important;
}

.bg-lime-active {
    background-color: #00e765 !important;
}

.bg-orange-active {
    background-color: #ff7701 !important;
}

.bg-fuchsia-active {
    background-color: #db0ead !important;
}

.bg-purple-active {
    background-color: #555299 !important;
}

.bg-maroon-active {
    background-color: #ca195a !important;
}

[class^="bg-"].disabled {
    opacity: 0.65;
    filter: alpha(opacity=65);
}

.text-red {
    color: #dd4b39 !important;
}

.text-yellow {
    color: #f39c12 !important;
}

.text-aqua {
    color: #00c0ef !important;
}

.text-blue {
    color: #0073b7 !important;
}

.text-black {
    color: #111111 !important;
}

.text-light-blue {
    color: #3c8dbc !important;
}

.text-green {
    color: #00a65a !important;
}

.text-gray {
    color: #d2d6de !important;
}

.text-navy {
    color: #001f3f !important;
}

.text-teal {
    color: #39cccc !important;
}

.text-olive {
    color: #3d9970 !important;
}

.text-lime {
    color: #01ff70 !important;
}

.text-orange {
    color: #ff851b !important;
}

.text-fuchsia {
    color: #f012be !important;
}

.text-purple {
    color: #605ca8 !important;
}

.text-maroon {
    color: #d81b60 !important;
}

.link-muted {
    color: #7a869d;
}

.link-muted:hover,
.link-muted:focus {
    color: #606c84;
}

.link-black {
    color: #666;
}

.link-black:hover,
.link-black:focus {
    color: #999;
}

.hide {
    display: none !important;
}

.no-border {
    border: 0 !important;
}

.no-padding {
    padding: 0 !important;
}

.no-margin {
    margin: 0 !important;
}

.no-shadow {
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
}

.list-unstyled,
.chart-legend,
.contacts-list,
.users-list,
.mailbox-attachments {
    list-style: none;
    margin: 0;
    padding: 0;
}

.list-group-unbordered > .list-group-item {
    border-left: 0;
    border-right: 0;
    border-radius: 0;
    padding-left: 0;
    padding-right: 0;
}

.flat {
    border-radius: 0 !important;
}

.text-bold,
.text-bold.table td,
.text-bold.table th {
    font-weight: 700;
}

.text-sm {
    font-size: 12px;
}

.jqstooltip {
    padding: 5px !important;
    width: auto !important;
    height: auto !important;
}

.bg-teal-gradient {
    background: #39cccc !important;
    background: -o-linear-gradient(#7adddd, #39cccc) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#7adddd', endColorstr='#39cccc', GradientType=0) !important;
    color: #fff;
}

.bg-light-blue-gradient {
    background: #3c8dbc !important;
    background: -o-linear-gradient(#67a8ce, #3c8dbc) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#67a8ce', endColorstr='#3c8dbc', GradientType=0) !important;
    color: #fff;
}

.bg-blue-gradient {
    background: #0073b7 !important;
    background: -o-linear-gradient(#0089db, #0073b7) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#0089db', endColorstr='#0073b7', GradientType=0) !important;
    color: #fff;
}

.bg-aqua-gradient {
    background: #00c0ef !important;
    background: -o-linear-gradient(#14d1ff, #00c0ef) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#14d1ff', endColorstr='#00c0ef', GradientType=0) !important;
    color: #fff;
}

.bg-yellow-gradient {
    background: #f39c12 !important;
    background: -o-linear-gradient(#f7bc60, #f39c12) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f7bc60', endColorstr='#f39c12', GradientType=0) !important;
    color: #fff;
}

.bg-purple-gradient {
    background: #605ca8 !important;
    background: -o-linear-gradient(#9491c4, #605ca8) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#9491c4', endColorstr='#605ca8', GradientType=0) !important;
    color: #fff;
}

.bg-green-gradient {
    background: #00a65a !important;
    background: -o-linear-gradient(#00ca6d, #00a65a) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00ca6d', endColorstr='#00a65a', GradientType=0) !important;
    color: #fff;
}

.bg-red-gradient {
    background: #dd4b39 !important;
    background: -o-linear-gradient(#e47365, #dd4b39) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e47365', endColorstr='#dd4b39', GradientType=0) !important;
    color: #fff;
}

.bg-black-gradient {
    background: #111111 !important;
    background: -o-linear-gradient(#2b2b2b, #111111) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#2b2b2b', endColorstr='#111111', GradientType=0) !important;
    color: #fff;
}

.bg-maroon-gradient {
    background: #d81b60 !important;
    background: -o-linear-gradient(#e73f7c, #d81b60) !important;
    filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#e73f7c', endColorstr='#d81b60', GradientType=0) !important;
    color: #fff;
}

.description-block .description-icon {
    font-size: 16px;
}

.no-pad-top {
    padding-top: 0;
}

.position-static {
    position: static !important;
}

.list-header {
    font-size: 15px;
    padding: 10px 4px;
    font-weight: bold;
    color: #666;
}

.list-seperator {
    height: 1px;
    background: #f4f4f4;
    margin: 15px 0 9px 0;
}

.list-link > a {
    padding: 4px;
    color: #777;
}

.list-link > a:hover {
    color: #222;
}

.font-light {
    font-weight: 300;
}

.user-block:before,
.user-block:after {
    content: " ";
    display: table;
}

.user-block:after {
    clear: both;
}

.user-block img {
    width: 40px;
    height: 40px;
    float: left;
}

.user-block .username,
.user-block .description,
.user-block .comment {
    display: block;
    margin-left: 50px;
}

.user-block .username {
    font-size: 16px;
    font-weight: 600;
}

.user-block .description {
    color: #999;
    font-size: 13px;
}

.user-block.user-block-sm .username,
.user-block.user-block-sm .description,
.user-block.user-block-sm .comment {
    margin-left: 40px;
}

.user-block.user-block-sm .username {
    font-size: 14px;
}

.img-sm,
.img-md,
.img-lg,
.box-comments .box-comment img,
.user-block.user-block-sm img {
    float: left;
}

.img-sm,
.box-comments .box-comment img,
.user-block.user-block-sm img {
    width: 30px !important;
    height: 30px !important;
}

.img-sm + .img-push {
    margin-left: 40px;
}

.img-md {
    width: 60px;
    height: 60px;
}

.img-md + .img-push {
    margin-left: 70px;
}

.img-lg {
    width: 100px;
    height: 100px;
}

.img-lg + .img-push {
    margin-left: 110px;
}

.img-bordered {
    border: 3px solid #d2d6de;
    padding: 3px;
}

.img-bordered-sm {
    border: 2px solid #d2d6de;
    padding: 2px;
}

.attachment-block {
    border: 1px solid #f4f4f4;
    padding: 5px;
    margin-bottom: 10px;
    background: #f7f7f7;
}

.attachment-block .attachment-img {
    max-width: 100px;
    max-height: 100px;
    height: auto;
    float: left;
}

.attachment-block .attachment-pushed {
    margin-left: 110px;
}

.attachment-block .attachment-heading {
    margin: 0;
}

.attachment-block .attachment-text {
    color: #555;
}

.connectedSortable {
    min-height: 100px;
}

.ui-helper-hidden-accessible {
    border: 0;
    clip: rect(0 0 0 0);
    height: 1px;
    margin: -1px;
    overflow: hidden;
    padding: 0;
    position: absolute;
    width: 1px;
}

.sort-highlight {
    background: #f4f4f4;
    border: 1px dashed #ddd;
    margin-bottom: 10px;
}

.full-opacity-hover {
    opacity: 0.65;
    filter: alpha(opacity=65);
}

.full-opacity-hover:hover {
    opacity: 1;
    filter: alpha(opacity=100);
}

.chart {
    position: relative;
    overflow: hidden;
    width: 100%;
}

.chart svg,
.chart canvas {
    width: 100% !important;
}

/*
 * Misc: print
 * -----------
 */

@media print {
    .no-print,
    .main-sidebar,
    .left-side,
    .main-header,
    .content-header {
        display: none !important;
    }

    .content-wrapper,
    .right-side,
    .main-footer {
    margin-left: 0 !important;
        min-height: 0 !important;
        -webkit-transform: translate(0, 0) !important;
        transform: translate(0, 0) !important;
    }

    .fixed .content-wrapper,
    .fixed .right-side {
    padding-top: 0 !important;
    }

    .invoice {
        width: 100%;
    border: 0;
        margin: 0;
        padding: 0;
    }

    .invoice-col {
        float: left;
        width: 33.3333333%;
    }

    .table-responsive {
        overflow: auto;
    }

    .table-responsive > .table tr th,
    .table-responsive > .table tr td {
        white-space: normal !important;
    }
}

/*
 * this version of bootstrap breaks the theme
 * // Variables
 * //@import 'variables';
 * // Bootstrap
 * //@import '~bootstrap/scss/bootstrap';
 */



.box {
    padding: 20px;
    margin-top: 15px;
}
.box-header {
    margin-bottom: 15px;}

.form-box-width {
        width: 35px;
}    

.content-header > .breadcrumb {
    position: static;    
}
.edit_department>tbody>tr>td { border: 0px !important; }
.datepicker.datepicker-dropdown.dropdown-menu{z-index:9999 !important;}

.form-resident {
    
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    /* border: 1px solid #ccc; */
    /* border-radius: 4px; */
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    -webkit-transition: border-color ease-in-out .15s,-webkit-box-shadow ease-in-out .15s;
    -o-transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
    transition: border-color ease-in-out .15s,box-shadow ease-in-out .15s;
}
    </style>
<style type="text/css">
  
@media print {
    .vendorListHeading {
        background-color: #F65874 !important;
        -webkit-print-color-adjust: exact; 
        position: fixed(header);
    }
}
@media print {
    .vendorListHeading {
        color: white !important;
    }
}
@media print {
    .btn.vendorListHeading {
        display: none;
    }
}
@media print {
    .title{
      color:#0046DA !important;
    }
}
@media print {
    .h44{
      font-weight: bold;
      margin-top: 0 !important;
      margin-bottom: 0 !important;
    }
}
@media print {
    .h5{
      font-size: 18px !important;
    }
}
@media print {
    .radio input:checked ~ .checkround{
      background: #0046da !important; 
      background-color: #fff;
    }
}
@media print {
  .radio.checkround.radio-oneline{
      /*background: #0046da !important;*/
  }
}


.header {
    background: #F65874;
    color: #fff;
    position: absolute;
    width: 100%;
    z-index: 999;
}
.h44 {
    font-weight: bold;
    font-size: 18px !important;

}
}

</style>

    <script type="text/javascript">
      

    </script>
<script src="{{ asset('bower_components/pdf_print/dataTables.buttons.min.js') }}"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.flash.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script> -->
<script src="{{ asset('bower_components/pdf_print/pdfmake.min.js') }}"></script>
<script src="{{ asset('bower_components/pdf_print/vfs_fonts.js') }}"></script>
<script src="{{ asset('bower_components/pdf_print/buttons.html5.min.js') }}"></script>
<script src="{{ asset('bower_components/pdf_print/buttons.print.min.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <link href="{{ asset('bower_components/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
  {{-- <link href="{{ asset('css/form_style.css') }}" rel="stylesheet"> --}}
  <link href="{{ asset('bower_components/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">  
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
     <link rel="shortcut icon" href="{{ url('dist/img/ct_fav.png') }}">
    <title>Survey Form</title>
    <!-- Bootstrap core CSS -->
  
    <link href="css/bootstrap.min.css" rel="stylesheet" media="all" type="text/css">
      <link href="css/style.css" rel="stylesheet" media="all" type="text/css">
    <link href="css/font-awesome.min.css" rel="stylesheet" media="all" type="text/css">
   
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">
<body>
<div id="content clickbind">
  <div class="header vendorListHeading">
       <div class="row">
        <div class="col-sm-12 text-center">
          <img src="{{ url('dist/img/logo.svg') }}" class="logo">
        </div>
       </div>
  </div>
  <section class="">
  <div class="container">
  <section class="">
        <div class="container">
          <div class="row">
              <div class="col-sm-12">
      
            <div class="col-md-12 connectthat-body">
              <div class="connectthat-form ">
              @if(session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
                </div>
      {{--         @if($errors->any())
              <ul class="alert alert-danger">
                  Please fill all fields. --}}
                  {{-- @foreach ($errors->all() as $error)
                      <li >{{ $error }}</li>
                  @endforeach --}}
          {{--       </ul>

            @endif  --}}
                <div class="row">
                  <div class="col-md-11">
                   <h5 class="title">{{ (!empty($survey_track->survey_title)) ? $survey_track->survey_title : $surveys[0]->survey_name}}</h5>
                  </div>
                <div class="col-md-1">
                  <h5>
                    <button class="btn btn-primary vendorListHeading" onclick="window.print()">Print & PDF</button>
                    {{-- <button class="btn btn-primary vendorListHeading click" onclick="Gen(); return false;">Generate PDF</button> --}}
                  </h5>
                  </div>
                </div>

                <div class="row">
                <div class="col-md-12">
                 <h5 class="h44"> {{($survey_type != 'Resident of Attending') ? 'Person Being Evaluated' : 'Attending Name'  }} : {{$submit_name}}</h5>
                </div></br>
                <div class="col-md-12">
                 <h5 class="h44">Survey Type: {{$survey_type}}</h5>
                 </div>
                 

                </div>
                </div>
             
                <form method="post" action="{{ route('surveysubmit', $urlcode) }}" name="submit_survey" id="submit_survey">
                  @csrf
                <div class="row">
                  <input type="hidden" value="{{$questions_ids}}" name="questions_ids">
                  <div class="col-md-12">
                  @foreach ($surveys as $item=>$survey_value)
                    <label class="mt-40">{{$item + '1'}}. {!! $survey_value->question_title !!}</label>
                    @if(!empty($survey_value->option_1))
                    <div class="radio-lbl radio-oneline">
                      <label class="radio">
                      <input {{ ( isset($survey_value->final_question) && ($survey_value->final_question == $survey_value->question_id) && $survey_value->final_answer == 'option_1')? "checked" : ( old('option_'.$survey_value->question_id)  == 'option_1' ? "checked" : "" ) }} type="radio" value="option_1" name="option_{{$survey_value->question_id}}" {{$survey_track->submitted ? "disabled" : ""}}  >
                     
                      @if (Auth::check() && Auth::user()->hasRole("ROLE_ADMIN"))
                      {{$survey_value->option_1}} 
                      @else
                      {{$survey_value->option_1}}
                      @endif
                      <span class="checkround"></span>
                       </label>
                    </div>
                    @endif


                    @if(!empty($survey_value->option_2))
                    <div class="radio-lbl radio-oneline">
                      <label class="radio"> 
                       
                       <input {{ ( isset($survey_value->final_question) && ($survey_value->final_question == $survey_value->question_id) && $survey_value->final_answer == 'option_2') ? "checked" : (old('option_'.$survey_value->question_id)  == 'option_2' ? "checked" : "") }} type="radio" value="option_2" name="option_{{$survey_value->question_id}}" {{$survey_track->submitted ? "disabled" : ""}}  >
                      
                      @if (Auth::check() && Auth::user()->hasRole("ROLE_ADMIN"))
                      {{$survey_value->option_2}} 
                      @else
                      {{$survey_value->option_2}}
                      @endif
                      <span class="checkround"></span> </label>
                    </div>
                    @endif
                   
                   @if(!empty($survey_value->option_2))
                    <div class="radio-lbl radio-oneline">
                      <label class="radio">  
                      <input {{ ( isset($survey_value->final_question) && ($survey_value->final_question == $survey_value->question_id) && $survey_value->final_answer == 'option_3') ? "checked" : (old('option_'.$survey_value->question_id)  == 'option_3' ? "checked" : "") }} type="radio" value="option_3" name="option_{{$survey_value->question_id}}" {{$survey_track->submitted ? "disabled" : ""}} >
                       
                      @if (Auth::check() && Auth::user()->hasRole("ROLE_ADMIN"))
                      {{$survey_value->option_3}} 
                      @else
                      {{$survey_value->option_3}}
                      @endif
                      <span class="checkround"></span> </label>
                    </div>
                    @endif

                    @if(!empty($survey_value->option_4))   
                      <div class="radio-lbl radio-oneline">
                        <label class="radio">
                         <input {{ ( isset($survey_value->final_question) && ($survey_value->final_question == $survey_value->question_id) && $survey_value->final_answer == 'option_4')? "checked" : (old('option_'.$survey_value->question_id)  == 'option_4' ? "checked" : "") }} type="radio" value="option_4" name="option_{{$survey_value->question_id}}" {{$survey_track->submitted ? "disabled" : "" }} >
                         
                         @if (Auth::check() && Auth::user()->hasRole("ROLE_ADMIN"))
                          {{$survey_value->option_4}} 
                          @else
                          {{$survey_value->option_4}}
                          @endif
                      
                        <span class="checkround"></span> </label>
                      </div>
                    @endif

                    @if(empty($survey_value->option_1)) 
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group">
                        
                        <textarea class="form-control" rows="5" id="" name="option_{{$survey_value->question_id}}" {{$survey_track->submitted ? "disabled" : ""}} >{{ isset($survey_value->final_answer) ? $survey_value->final_answer : old('option_'.$survey_value->question_id) }} </textarea>
                         
                          </div>
                      </div> 
                    </div>
                    @endif
                    
                @endforeach
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-10">
                @if(!$survey_track->submitted)
                    <button type="submit" class="btn btn-success vendorListHeading" onclick="this.disabled=true;this.form.submit();">Submit</button>
              @endif
                  </div>
                  
                </div>
              </form>
            </div>
          </div>
        </div>
      </section>
  </div>
  </section>
</div>

</body>
{{-- <script type="text/javascript">
  function Gen() {
  var pdf = new jsPDF('p', 'mm', 'a4');
  pdf.canvas.height = 595.28;
  pdf.canvas.width = 841.89;

  // pdf.fromHTML(document.body);
  pdf.addHTML(document.body, function() {
    pdf.save('test.pdf');
});

//   pdf.save('test.pdf');
// };
}

var element = document.getElementById("clickbind");
element.addEventListener("click", Gen);
</script> --}}

</html>

