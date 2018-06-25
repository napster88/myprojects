<?php
/**
 * The template for displaying about us page.
 *
 * Template Name: frenchise
 *
 */
 ?>
 <html lang="en">
<head>

	  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<title>Talentedge</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:600%7CSource+Sans+Pro:600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/fonts/fontawesome-webfont.woff2" rel="stylesheet">


	<style>
	.icon-diamond:before {
  content: "\e043"; }

.icon-pie-chart:before {
  content: "\e05e"; }

.icon-layers:before {
  content: "\e034"; }


.icon-chemistry:before {
  content: "\e026"; }

.fa-times:before {
  content: ""; }
	.gfield_label {display:none !important;}
	.gform_button
	{
		background: #ffb606 !important;
	    border-radius: 50px !important;
		width: 200px;
		height: 53px !important;
		color: #333 !important;
		font-weight: 600;
	}
	.gform_fields
	{
		list-style:none;
	}
	.gfield_required
	{
		display:none;
	}
		ul
html {
  font-family: sans-serif;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%; }

body {


  margin: 0; }

article,
aside,
details,
figcaption,
figure,
footer,
header,
hgroup,
main,
menu,
nav,
section,
summary {
  display: block; }

audio,
canvas,
progress,
video {
  display: inline-block;
  vertical-align: baseline; }

audio:not([controls]) {
  display: none;
  height: 0; }

[hidden],
template {
  display: none; }

a {
  background-color: transparent; }

a:active,
a:hover {
  outline: 0; }

abbr[title] {
  border-bottom: 1px dotted; }

b,
strong {
  font-weight: bold; }

dfn {
  font-style: italic; }

h1 {
  font-size: 2em;
  margin: 0.67em 0; }

mark {
  background: #ff0;
  color: #000; }

small {
  font-size: 80%; }

sub,
sup {
  font-size: 75%;
  line-height: 0;
  position: relative;
  vertical-align: baseline; }

sup {
  top: -0.5em; }

sub {
  bottom: -0.25em; }

img {
  border: 0; }

svg:not(:root) {
  overflow: hidden; }

figure {
  margin: 1em 40px; }

hr {
  box-sizing: content-box;
  height: 0; }

pre {
  overflow: auto; }

code,
kbd,
pre,
samp {
  font-family: monospace, monospace;
  font-size: 1em; }

button,
input,
optgroup,
select,
textarea {
  color: inherit;
  font: inherit;
  margin: 0; }

button {
  overflow: visible; }

button,
select {
  text-transform: none; }

button,
html input[type="button"],
input[type="reset"],
input[type="submit"] {
  -webkit-appearance: button;
  cursor: pointer; }

button[disabled],
html input[disabled] {
  cursor: default; }

button::-moz-focus-inner,
input::-moz-focus-inner {
  border: 0;
  padding: 0; }

input {
  line-height: normal; }

input[type="checkbox"],
input[type="radio"] {
  box-sizing: border-box;
  padding: 0; }

input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
  height: auto; }

input[type="search"] {
  -webkit-appearance: textfield;
  box-sizing: content-box; }

input[type="search"]::-webkit-search-cancel-button,
input[type="search"]::-webkit-search-decoration {
  -webkit-appearance: none; }

fieldset {
  border: 1px solid #c0c0c0;
  margin: 0 2px;
  padding: 0.35em 0.625em 0.75em; }

legend {
  border: 0;
  padding: 0; }

textarea {
  overflow: auto; }

optgroup {
  font-weight: bold; }

table {
  border-collapse: collapse;
  border-spacing: 0; }

td,
th {
  padding: 0; }

/*! Source: https://github.com/h5bp/html5-boilerplate/blob/master/src/css/main.css */
@media print {
  *,
  *:before,
  *:after {
    background: transparent !important;
    color: #000 !important;
    box-shadow: none !important;
    text-shadow: none !important; }

  a,
  a:visited {
    text-decoration: underline; }

  a[href]:after {
    content: " (" attr(href) ")"; }

  abbr[title]:after {
    content: " (" attr(title) ")"; }

  a[href^="#"]:after,
  a[href^="javascript:"]:after {
    content: ""; }

  pre,
  blockquote {
    border: 1px solid #999;
    page-break-inside: avoid; }

  thead {
    display: table-header-group; }

  tr,
  img {
    page-break-inside: avoid; }

  img {
    max-width: 100% !important; }

  p,
  h2,
  h3 {
    orphans: 3;
    widows: 3; }

  h2,
  h3 {
    page-break-after: avoid; }

  .navbar {
    display: none; }

  .btn > .caret,
  .dropup > .btn > .caret {
    border-top-color: #000 !important; }

  .label {
    border: 1px solid #000; }

  .table {
    border-collapse: collapse !important; }
    .table td,
    .table th {
      background-color: #fff !important; }

  .table-bordered th,
  .table-bordered td {
    border: 1px solid #ddd !important; } }
* {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; }

*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; }

html {
  font-size: 10px;
  -webkit-tap-highlight-color: transparent; }

body {
 font-family: 'Nunito', sans-serif;
  font-size: 14px;
  line-height: 1.4;
  color: #708198;
  background-color: #fff; }

input,
button,
select,
textarea {
  font-family: inherit;
  font-size: inherit;
  line-height: inherit; }

a {
  color: #8089ff;
  text-decoration: none; }
  a:hover, a:focus {
    color: #3442ff;
    text-decoration: none; }
  a:focus {
    outline: 0;
    outline-offset: 0; }

figure {
  margin: 0; }

img {
  vertical-align: middle; }

.img-responsive {
  display: block;
  max-width: 100%;
  height: auto; }

.img-rounded {
  border-radius: 1.25rem; }

.img-thumbnail {
  padding: 4px;
  line-height: 1.4;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 0.5rem;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
  display: inline-block;
  max-width: 100%;
  height: auto; }

.img-circle {
  border-radius: 50%; }

hr {
  margin-top: 19px;
  margin-bottom: 19px;
  border: 0;
  border-top: 1px solid #f6f7f8; }

.sr-only {
  position: absolute;
  width: 1px;
  height: 1px;
  margin: -1px;
  padding: 0;
  overflow: hidden;
  clip: rect(0, 0, 0, 0);
  border: 0; }

.sr-only-focusable:active, .sr-only-focusable:focus {
  position: static;
  width: auto;
  height: auto;
  margin: 0;
  overflow: visible;
  clip: auto; }

[role="button"] {
  cursor: pointer; }

h1, h2, h3, h4, h5, h6,
.h1, .h2, .h3, .h4, .h5, .h6 {
  font-family: 'Nunito', sans-serif;
  font-weight: 700;
  line-height: 1.1;
  color: inherit; }
  h1 small,
  h1 .small, h2 small,
  h2 .small, h3 small,
  h3 .small, h4 small,
  h4 .small, h5 small,
  h5 .small, h6 small,
  h6 .small,
  .h1 small,
  .h1 .small, .h2 small,
  .h2 .small, .h3 small,
  .h3 .small, .h4 small,
  .h4 .small, .h5 small,
  .h5 .small, .h6 small,
  .h6 .small {
    font-weight: normal;
    line-height: 1;
    color: #8e9bae; }

h1, .h1,
h2, .h2,
h3, .h3 {
  margin-top: 0;
  margin-bottom: 1rem; }
  h1 small,
  h1 .small, .h1 small,
  .h1 .small,
  h2 small,
  h2 .small, .h2 small,
  .h2 .small,
  h3 small,
  h3 .small, .h3 small,
  .h3 .small {
    font-size: 65%; }

h4, .h4,
h5, .h5,
h6, .h6 {
  margin-top: 0;
  margin-bottom: 1rem; }
  h4 small,
  h4 .small, .h4 small,
  .h4 .small,
  h5 small,
  h5 .small, .h5 small,
  .h5 .small,
  h6 small,
  h6 .small, .h6 small,
  .h6 .small {
    font-size: 75%; }

h1, .h1 {
  font-size: 3.6rem; }

h2, .h2 {
  font-size: 2.2rem; }

h3, .h3 {
  font-size: 2rem; }

h4, .h4 {
  font-size: 1.5rem; }

h5, .h5 {
  font-size: 1.25rem; }

h6, .h6 {
  font-size: 1.1rem; }

p {
  margin: 0 0 1rem; }

.lead {
  margin-bottom: 19px;
  font-size: 16px;
  font-weight: 300;
  line-height: 1.4; }
  @media (min-width: 740px) {
    .lead {
      font-size: 21px; } }

small,
.small {
  font-size: 92%; }

.text-left {
  text-align: left; }

.text-right {
  text-align: right; }

.text-center {
  text-align: center; }

.text-justify {
  text-align: justify; }

.text-nowrap {
  white-space: nowrap; }

.text-lowercase {
  text-transform: lowercase; }

.text-uppercase {
  text-transform: uppercase; }

.text-capitalize {
  text-transform: capitalize; }

.text-muted {
  color: #8e9bae; }

.text-primary {
  color: #8089ff; }

a.text-primary:hover,
a.text-primary:focus {
  color: #4d5aff; }

.text-success {
  color: #19d9b4; }

a.text-success:hover,
a.text-success:focus {
  color: #14ab8e; }

.text-info {
  color: #84ce65; }

a.text-info:hover,
a.text-info:focus {
  color: #65c23e; }

.text-warning {
  color: #fe60a1; }

a.text-warning:hover,
a.text-warning:focus {
  color: #fe2d83; }

.text-danger {
  color: #fe60a1; }

a.text-danger:hover,
a.text-danger:focus {
  color: #fe2d83; }

.bg-primary {
  color: #fff; }

.bg-primary {
  background-color: #8089ff; }

a.bg-primary:hover,
a.bg-primary:focus {
  background-color: #4d5aff; }

.bg-success {
  background-color: rgba(49, 193, 165, 0.35); }

a.bg-success:hover,
a.bg-success:focus {
  background-color: rgba(39, 152, 130, 0.35); }

.bg-info {
  background-color: rgba(140, 186, 121, 0.35); }

a.bg-info:hover,
a.bg-info:focus {
  background-color: rgba(112, 168, 88, 0.35); }

.bg-warning {
  background-color: rgba(238, 112, 164, 0.35); }

a.bg-warning:hover,
a.bg-warning:focus {
  background-color: rgba(233, 66, 135, 0.35); }

.bg-danger {
  background-color: rgba(238, 112, 164, 0.35); }

a.bg-danger:hover,
a.bg-danger:focus {
  background-color: rgba(233, 66, 135, 0.35); }

ul,
ol {
  margin-top: 0;
  margin-bottom: 0; }
  ul ul,
  ul ol,
  ol ul,
  ol ol {
    margin-bottom: 0; }

code,
kbd,
pre,
samp {
  font-family: Menlo, Monaco, Consolas, "Courier New", monospace; }

code {
  padding: 2px 4px;
  font-size: 90%;
  color: #c7254e;
  background-color: #f9f2f4;
  border-radius: 0.5rem; }

kbd {
  padding: 2px 4px;
  font-size: 90%;
  color: #fff;
  background-color: #333;
  border-radius: 0.25rem;
  box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.25); }
  kbd kbd {
    padding: 0;
    font-size: 100%;
    font-weight: bold;
    box-shadow: none; }

pre {
  display: block;
  padding: 9px;
  margin: 0 0 9.5px;
  font-size: 13px;
  line-height: 1.4;
  word-break: break-all;
  word-wrap: break-word;
  color: #59687c;
  background-color: #f5f5f5;
  border: 1px solid #ccc;
  border-radius: 0.5rem; }
  pre code {
    padding: 0;
    font-size: inherit;
    color: inherit;
    white-space: pre-wrap;
    background-color: transparent;
    border-radius: 0; }

.pre-scrollable {
  max-height: 340px;
  overflow-y: scroll; }

.container {
  margin-right: auto;
  margin-left: auto;
  padding-left: 1rem;
  padding-right: 1rem; }
  .container:before, .container:after {
    content: " ";
    display: table; }
  .container:after {
    clear: both; }
  @media (min-width: 740px) {
    .container {
      width: 736px; } }
  @media (min-width: 992px) {
	  .media3 p{
				    font-size: 19px;
    line-height: 25px;
	font-weight:300;
    text-align: left;
    margin-top: 65px;
	color:#414c5a;
}
	  .mobile-only{
		  display:none !important;}
	  .fouth{
		padding:3rem 0 3rem;}
    .container {
      width: 956px; } }
  @media (min-width: 1200px) {
    .container {
      width: 1156px; } }

.container-fluid {
  margin-right: auto;
  margin-left: auto;
  padding-left: 1rem;
  padding-right: 1rem; }
  .container-fluid:before, .container-fluid:after {
    content: " ";
    display: table; }
  .container-fluid:after {
    clear: both; }

.row {
  margin-left: -1rem;
  margin-right: -1rem; }
  .row:before, .row:after {
    content: " ";
    display: table; }
  .row:after {
    clear: both; }

.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
  position: relative;
  min-height: 1px;
  padding-left: 1rem;
  padding-right: 1rem; }

.col-xs-1, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9, .col-xs-10, .col-xs-11, .col-xs-12 {
  float: left; }

.col-xs-1 {
  width: 8.33333%; }

.col-xs-2 {
  width: 16.66667%; }

.col-xs-3 {
  width: 25%; }

.col-xs-4 {
  width: 33.33333%; }

.col-xs-5 {
  width: 41.66667%; }

.col-xs-6 {
  width: 50%; }

.col-xs-7 {
  width: 58.33333%; }

.col-xs-8 {
  width: 66.66667%; }

.col-xs-9 {
  width: 75%; }

.col-xs-10 {
  width: 83.33333%; }

.col-xs-11 {
  width: 91.66667%; }

.col-xs-12 {
  width: 100%; }

.col-xs-pull-0 {
  right: auto; }

.col-xs-pull-1 {
  right: 8.33333%; }

.col-xs-pull-2 {
  right: 16.66667%; }

.col-xs-pull-3 {
  right: 25%; }

.col-xs-pull-4 {
  right: 33.33333%; }

.col-xs-pull-5 {
  right: 41.66667%; }

.col-xs-pull-6 {
  right: 50%; }

.col-xs-pull-7 {
  right: 58.33333%; }

.col-xs-pull-8 {
  right: 66.66667%; }

.col-xs-pull-9 {
  right: 75%; }

.col-xs-pull-10 {
  right: 83.33333%; }

.col-xs-pull-11 {
  right: 91.66667%; }

.col-xs-pull-12 {
  right: 100%; }

.col-xs-push-0 {
  left: auto; }

.col-xs-push-1 {
  left: 8.33333%; }

.col-xs-push-2 {
  left: 16.66667%; }

.col-xs-push-3 {
  left: 25%; }

.col-xs-push-4 {
  left: 33.33333%; }

.col-xs-push-5 {
  left: 41.66667%; }

.col-xs-push-6 {
  left: 50%; }

.col-xs-push-7 {
  left: 58.33333%; }

.col-xs-push-8 {
  left: 66.66667%; }

.col-xs-push-9 {
  left: 75%; }

.col-xs-push-10 {
  left: 83.33333%; }

.col-xs-push-11 {
  left: 91.66667%; }

.col-xs-push-12 {
  left: 100%; }

.col-xs-offset-0 {
  margin-left: 0%; }

.col-xs-offset-1 {
  margin-left: 8.33333%; }

.col-xs-offset-2 {
  margin-left: 16.66667%; }

.col-xs-offset-3 {
  margin-left: 25%; }

.col-xs-offset-4 {
  margin-left: 33.33333%; }

.col-xs-offset-5 {
  margin-left: 41.66667%; }

.col-xs-offset-6 {
  margin-left: 50%; }

.col-xs-offset-7 {
  margin-left: 58.33333%; }

.col-xs-offset-8 {
  margin-left: 66.66667%; }

.col-xs-offset-9 {
  margin-left: 75%; }

.col-xs-offset-10 {
  margin-left: 83.33333%; }

.col-xs-offset-11 {
  margin-left: 91.66667%; }

.col-xs-offset-12 {
  margin-left: 100%; }

@media (min-width: 740px) {
  .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12 {
    float: left; }

  .col-sm-1 {
    width: 8.33333%; }

  .col-sm-2 {
    width: 16.66667%; }

  .col-sm-3 {
    width: 25%; }

  .col-sm-4 {
    width: 33.33333%; }

  .col-sm-5 {
    width: 41.66667%; }

  .col-sm-6 {
    width: 50%; }

  .col-sm-7 {
    width: 58.33333%; }

  .col-sm-8 {
    width: 66.66667%; }

  .col-sm-9 {
    width: 75%; }

  .col-sm-10 {
    width: 83.33333%; }

  .col-sm-11 {
    width: 91.66667%; }

  .col-sm-12 {
    width: 100%; }

  .col-sm-pull-0 {
    right: auto; }

  .col-sm-pull-1 {
    right: 8.33333%; }

  .col-sm-pull-2 {
    right: 16.66667%; }

  .col-sm-pull-3 {
    right: 25%; }

  .col-sm-pull-4 {
    right: 33.33333%; }

  .col-sm-pull-5 {
    right: 41.66667%; }

  .col-sm-pull-6 {
    right: 50%; }

  .col-sm-pull-7 {
    right: 58.33333%; }

  .col-sm-pull-8 {
    right: 66.66667%; }

  .col-sm-pull-9 {
    right: 75%; }

  .col-sm-pull-10 {
    right: 83.33333%; }

  .col-sm-pull-11 {
    right: 91.66667%; }

  .col-sm-pull-12 {
    right: 100%; }

  .col-sm-push-0 {
    left: auto; }

  .col-sm-push-1 {
    left: 8.33333%; }

  .col-sm-push-2 {
    left: 16.66667%; }

  .col-sm-push-3 {
    left: 25%; }

  .col-sm-push-4 {
    left: 33.33333%; }

  .col-sm-push-5 {
    left: 41.66667%; }

  .col-sm-push-6 {
    left: 50%; }

  .col-sm-push-7 {
    left: 58.33333%; }

  .col-sm-push-8 {
    left: 66.66667%; }

  .col-sm-push-9 {
    left: 75%; }

  .col-sm-push-10 {
    left: 83.33333%; }

  .col-sm-push-11 {
    left: 91.66667%; }

  .col-sm-push-12 {
    left: 100%; }

  .col-sm-offset-0 {
    margin-left: 0%; }

  .col-sm-offset-1 {
    margin-left: 8.33333%; }

  .col-sm-offset-2 {
    margin-left: 16.66667%; }

  .col-sm-offset-3 {
    margin-left: 25%; }

  .col-sm-offset-4 {
    margin-left: 33.33333%; }

  .col-sm-offset-5 {
    margin-left: 41.66667%; }

  .col-sm-offset-6 {
    margin-left: 50%; }

  .col-sm-offset-7 {
    margin-left: 58.33333%; }

  .col-sm-offset-8 {
    margin-left: 66.66667%; }

  .col-sm-offset-9 {
    margin-left: 75%; }

  .col-sm-offset-10 {
    margin-left: 83.33333%; }

  .col-sm-offset-11 {
    margin-left: 91.66667%; }

  .col-sm-offset-12 {
    margin-left: 100%; } }
@media (min-width: 992px) {
  .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
    float: left; }

  .col-md-1 {
    width: 8.33333%; }

  .col-md-2 {
    width: 16.66667%; }

  .col-md-3 {
    width: 25%; }

  .col-md-4 {
    width: 33.33333%; }

  .col-md-5 {
    width: 41.66667%; }

  .col-md-6 {
    width: 50%; }

  .col-md-7 {
    width: 58.33333%; }

  .col-md-8 {
    width: 66.66667%; }

  .col-md-9 {
    width: 75%; }

  .col-md-10 {
    width: 83.33333%; }

  .col-md-11 {
    width: 91.66667%; }

  .col-md-12 {
    width: 100%; }

  .col-md-pull-0 {
    right: auto; }

  .col-md-pull-1 {
    right: 8.33333%; }

  .col-md-pull-2 {
    right: 16.66667%; }

  .col-md-pull-3 {
    right: 25%; }

  .col-md-pull-4 {
    right: 33.33333%; }

  .col-md-pull-5 {
    right: 41.66667%; }

  .col-md-pull-6 {
    right: 50%; }

  .col-md-pull-7 {
    right: 58.33333%; }

  .col-md-pull-8 {
    right: 66.66667%; }

  .col-md-pull-9 {
    right: 75%; }

  .col-md-pull-10 {
    right: 83.33333%; }

  .col-md-pull-11 {
    right: 91.66667%; }

  .col-md-pull-12 {
    right: 100%; }

  .col-md-push-0 {
    left: auto; }

  .col-md-push-1 {
    left: 8.33333%; }

  .col-md-push-2 {
    left: 16.66667%; }

  .col-md-push-3 {
    left: 25%; }

  .col-md-push-4 {
    left: 33.33333%; }

  .col-md-push-5 {
    left: 41.66667%; }

  .col-md-push-6 {
    left: 50%; }

  .col-md-push-7 {
    left: 58.33333%; }

  .col-md-push-8 {
    left: 66.66667%; }

  .col-md-push-9 {
    left: 75%; }

  .col-md-push-10 {
    left: 83.33333%; }

  .col-md-push-11 {
    left: 91.66667%; }

  .col-md-push-12 {
    left: 100%; }

  .col-md-offset-0 {
    margin-left: 0%; }

  .col-md-offset-1 {
    margin-left: 8.33333%; }

  .col-md-offset-2 {
    margin-left: 16.66667%; }

  .col-md-offset-3 {
    margin-left: 25%; }

  .col-md-offset-4 {
    margin-left: 33.33333%; }

  .col-md-offset-5 {
    margin-left: 41.66667%; }

  .col-md-offset-6 {
    margin-left: 50%; }

  .col-md-offset-7 {
    margin-left: 58.33333%; }

  .col-md-offset-8 {
    margin-left: 66.66667%; }

  .col-md-offset-9 {
    margin-left: 75%; }

  .col-md-offset-10 {
    margin-left: 83.33333%; }

  .col-md-offset-11 {
    margin-left: 91.66667%; }

  .col-md-offset-12 {
    margin-left: 100%; } }
@media (min-width: 1367px) {

  .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12 {
    float: left; }

  .col-lg-1 {
    width: 8.33333%; }

  .col-lg-2 {
    width: 16.66667%; }

  .col-lg-3 {
    width: 25%; }

  .col-lg-4 {
    width: 33.33333%; }

  .col-lg-5 {
    width: 41.66667%; }

  .col-lg-6 {
    width: 50%; }

  .col-lg-7 {
    width: 58.33333%; }

  .col-lg-8 {
    width: 66.66667%; }

  .col-lg-9 {
    width: 75%; }

  .col-lg-10 {
    width: 83.33333%; }

  .col-lg-11 {
    width: 91.66667%; }

  .col-lg-12 {
    width: 100%; }

  .col-lg-pull-0 {
    right: auto; }

  .col-lg-pull-1 {
    right: 8.33333%; }

  .col-lg-pull-2 {
    right: 16.66667%; }

  .col-lg-pull-3 {
    right: 25%; }

  .col-lg-pull-4 {
    right: 33.33333%; }

  .col-lg-pull-5 {
    right: 41.66667%; }

  .col-lg-pull-6 {
    right: 50%; }

  .col-lg-pull-7 {
    right: 58.33333%; }

  .col-lg-pull-8 {
    right: 66.66667%; }

  .col-lg-pull-9 {
    right: 75%; }

  .col-lg-pull-10 {
    right: 83.33333%; }

  .col-lg-pull-11 {
    right: 91.66667%; }

  .col-lg-pull-12 {
    right: 100%; }

  .col-lg-push-0 {
    left: auto; }

  .col-lg-push-1 {
    left: 8.33333%; }

  .col-lg-push-2 {
    left: 16.66667%; }

  .col-lg-push-3 {
    left: 25%; }

  .col-lg-push-4 {
    left: 33.33333%; }

  .col-lg-push-5 {
    left: 41.66667%; }

  .col-lg-push-6 {
    left: 50%; }

  .col-lg-push-7 {
    left: 58.33333%; }

  .col-lg-push-8 {
    left: 66.66667%; }

  .col-lg-push-9 {
    left: 75%; }

  .col-lg-push-10 {
    left: 83.33333%; }

  .col-lg-push-11 {
    left: 91.66667%; }

  .col-lg-push-12 {
    left: 100%; }

  .col-lg-offset-0 {
    margin-left: 0%; }

  .col-lg-offset-1 {
    margin-left: 8.33333%; }

  .col-lg-offset-2 {
    margin-left: 16.66667%; }

  .col-lg-offset-3 {
    margin-left: 25%; }

  .col-lg-offset-4 {
    margin-left: 33.33333%; }

  .col-lg-offset-5 {
    margin-left: 41.66667%; }

  .col-lg-offset-6 {
    margin-left: 50%; }

  .col-lg-offset-7 {
    margin-left: 58.33333%; }

  .col-lg-offset-8 {
    margin-left: 66.66667%; }

  .col-lg-offset-9 {
    margin-left: 75%; }

  .col-lg-offset-10 {
    margin-left: 83.33333%; }

  .col-lg-offset-11 {
    margin-left: 91.66667%; }

  .col-lg-offset-12 {
    margin-left: 100%; } }
label {
  display: inline-block;
  max-width: 100%;
  margin-bottom: 5px;
  font-weight: bold; }

input[type="search"] {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box; }

input[type="search"], input[type="submit"], button {
  -webkit-appearance: none;
  border: none; }

input[type="radio"], input[type="checkbox"] {
  margin: 4px 0 0;
  margin-top: 1px \9;
  line-height: normal; }

input[type="file"] {
  display: block; }

input[type="range"] {
  display: block;
  width: 100%; }

select[multiple], select[size] {
  height: auto; }

input[type="file"]:focus, input[type="radio"]:focus, input[type="checkbox"]:focus {
  outline: 0;
  outline-offset: 0; }

output {
  display: block;
  padding-top: 1.5rem;
  font-size: 14px;
  line-height: 1.4;
  color: #708198; }

.form-control, .medium {

  display: block;
  width: 100%;
  padding: 14px 1rem;
  font-size: 16px;
  line-height: 18px;
  color: #708198;
  background-color: #edeff2;
  background-image: none;
  border: 0;
  border-radius: 0.25rem;
  -webkit-transition: background-color 0.25s ease-out, box-shadow 0.25s ease-out;
  transition: background-color 0.25s ease-out, box-shadow 0.25s ease-out; }
  .form-control:focus {
    outline: 0;
    background-color: #FFF;
    box-shadow: 0 2px 5px rgba(36, 42, 50, 0.05), 0 3px 8px rgba(128, 137, 255, 0.1); }
  .form-control::-moz-placeholder {
    color: #252424;
    opacity: 1; }
  .form-control:-ms-input-placeholder {
    color: #252424; }
  .form-control::-webkit-input-placeholder {
    color: #252424; }
  .form-control::-ms-expand {
    border: 0;
    background-color: transparent; }
  .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
    background-color: #f6f7f8;
    opacity: 1; }
  .form-control[disabled], fieldset[disabled] .form-control {
    cursor: not-allowed; }

textarea.form-control {
  height: auto; }

button {
  margin-top: 2rem; }
  .con-btn button {
  margin-top: 0rem !important; }

@media screen and (-webkit-min-device-pixel-ratio: 0) {
  input[type="date"].form-control, input[type="time"].form-control, input[type="datetime-local"].form-control, input[type="month"].form-control {
    line-height: 2rem; }
  input[type="date"].input-sm, .input-group-sm > input[type="date"].form-control,
  .input-group-sm > input[type="date"].input-group-addon,
  .input-group-sm > .input-group-btn > input[type="date"].btn, .input-group-sm input[type="date"], input[type="time"].input-sm, .input-group-sm > input[type="time"].form-control,
  .input-group-sm > input[type="time"].input-group-addon,
  .input-group-sm > .input-group-btn > input[type="time"].btn, .input-group-sm input[type="time"], input[type="datetime-local"].input-sm, .input-group-sm > input[type="datetime-local"].form-control,
  .input-group-sm > input[type="datetime-local"].input-group-addon,
  .input-group-sm > .input-group-btn > input[type="datetime-local"].btn, .input-group-sm input[type="datetime-local"], input[type="month"].input-sm, .input-group-sm > input[type="month"].form-control,
  .input-group-sm > input[type="month"].input-group-addon,
  .input-group-sm > .input-group-btn > input[type="month"].btn, .input-group-sm input[type="month"] {
    line-height: 2rem; }
  input[type="date"].input-lg, .input-group-lg > input[type="date"].form-control,
  .input-group-lg > input[type="date"].input-group-addon,
  .input-group-lg > .input-group-btn > input[type="date"].btn, .input-group-lg input[type="date"], input[type="time"].input-lg, .input-group-lg > input[type="time"].form-control,
  .input-group-lg > input[type="time"].input-group-addon,
  .input-group-lg > .input-group-btn > input[type="time"].btn, .input-group-lg input[type="time"], input[type="datetime-local"].input-lg, .input-group-lg > input[type="datetime-local"].form-control,
  .input-group-lg > input[type="datetime-local"].input-group-addon,
  .input-group-lg > .input-group-btn > input[type="datetime-local"].btn, .input-group-lg input[type="datetime-local"], input[type="month"].input-lg, .input-group-lg > input[type="month"].form-control,
  .input-group-lg > input[type="month"].input-group-addon,
  .input-group-lg > .input-group-btn > input[type="month"].btn, .input-group-lg input[type="month"] {
    line-height: 3rem; } }
.form-group {
  margin-bottom: 1rem; }

.radio, .checkbox {
  position: relative;
  display: block;
  margin-top: 10px;
  margin-bottom: 10px; }
  .radio label, .checkbox label {
    min-height: 19px;
    padding-left: 20px;
    margin-bottom: 0;
    font-weight: normal;
    cursor: pointer; }

.radio input[type="radio"], .radio-inline input[type="radio"], .checkbox input[type="checkbox"], .checkbox-inline input[type="checkbox"] {
  position: absolute;
  margin-left: -20px;
  margin-top: 4px \9; }

.radio + .radio, .checkbox + .checkbox {
  margin-top: -5px; }

.radio-inline, .checkbox-inline {
  position: relative;
  display: inline-block;
  padding-left: 20px;
  margin-bottom: 0;
  vertical-align: middle;
  font-weight: normal;
  cursor: pointer; }

.radio-inline + .radio-inline, .checkbox-inline + .checkbox-inline {
  margin-top: 0;
  margin-left: 10px; }

input[type="radio"][disabled], input[type="radio"].disabled, fieldset[disabled] input[type="radio"], input[type="checkbox"][disabled], input[type="checkbox"].disabled, fieldset[disabled] input[type="checkbox"] {
  cursor: not-allowed; }

.radio-inline.disabled, fieldset[disabled] .radio-inline, .checkbox-inline.disabled, fieldset[disabled] .checkbox-inline {
  cursor: not-allowed; }

.radio.disabled label, fieldset[disabled] .radio label, .checkbox.disabled label, fieldset[disabled] .checkbox label {
  cursor: not-allowed; }

.form-control-static {
  padding-top: 1.5rem;
  padding-bottom: 1.5rem;
  margin-bottom: 0;
  min-height: 33px; }
  .form-control-static.input-lg, .input-group-lg > .form-control-static.form-control,
  .input-group-lg > .form-control-static.input-group-addon,
  .input-group-lg > .input-group-btn > .form-control-static.btn, .form-control-static.input-sm, .input-group-sm > .form-control-static.form-control,
  .input-group-sm > .form-control-static.input-group-addon,
  .input-group-sm > .input-group-btn > .form-control-static.btn {
    padding-left: 0;
    padding-right: 0; }

.input-sm, .input-group-sm > .form-control,
.input-group-sm > .input-group-addon,
.input-group-sm > .input-group-btn > .btn {
  height: 2rem;
  padding: 0.25rem 0.75rem;
  font-size: 13px;
  line-height: 1.5;
  border-radius: 0.25rem; }

select.input-sm, .input-group-sm > select.form-control,
.input-group-sm > select.input-group-addon,
.input-group-sm > .input-group-btn > select.btn {
  height: 2rem;
  line-height: 2rem; }

textarea.input-sm, .input-group-sm > textarea.form-control,
.input-group-sm > textarea.input-group-addon,
.input-group-sm > .input-group-btn > textarea.btn, select[multiple].input-sm, .input-group-sm > select[multiple].form-control,
.input-group-sm > select[multiple].input-group-addon,
.input-group-sm > .input-group-btn > select[multiple].btn {
  height: auto; }

.form-group-sm .form-control {
  height: 2rem;
  padding: 0.25rem 0.75rem;
  font-size: 13px;
  line-height: 1.5;
  border-radius: 0.25rem; }
.form-group-sm select.form-control {
  height: 2rem;
  line-height: 2rem; }
.form-group-sm textarea.form-control, .form-group-sm select[multiple].form-control {
  height: auto; }
.form-group-sm .form-control-static {
  height: 2rem;
  min-height: 32px;
  padding: 1.25rem 0.75rem;
  font-size: 13px;
  line-height: 1.5; }

.input-lg, .input-group-lg > .form-control,
.input-group-lg > .input-group-addon,
.input-group-lg > .input-group-btn > .btn {
  height: 3rem;
  padding: 0.75rem 1.5rem;
  font-size: 16px;
  line-height: 1.33333;
  border-radius: 0.25rem; }

select.input-lg, .input-group-lg > select.form-control,
.input-group-lg > select.input-group-addon,
.input-group-lg > .input-group-btn > select.btn {
  height: 3rem;
  line-height: 3rem; }

textarea.input-lg, .input-group-lg > textarea.form-control,
.input-group-lg > textarea.input-group-addon,
.input-group-lg > .input-group-btn > textarea.btn, select[multiple].input-lg, .input-group-lg > select[multiple].form-control,
.input-group-lg > select[multiple].input-group-addon,
.input-group-lg > .input-group-btn > select[multiple].btn {
  height: auto; }

.form-group-lg .form-control {
  height: 3rem;
  padding: 0.75rem 1.5rem;
  font-size: 16px;
  line-height: 1.33333;
  border-radius: 0.25rem; }
.form-group-lg select.form-control {
  height: 3rem;
  line-height: 3rem; }
.form-group-lg textarea.form-control, .form-group-lg select[multiple].form-control {
  height: auto; }
.form-group-lg .form-control-static {
  height: 3rem;
  min-height: 35px;
  padding: 1.75rem 1.5rem;
  font-size: 16px;
  line-height: 1.33333; }

.has-feedback {
  position: relative; }
  .has-feedback .form-control {
    padding-right: 2.5rem; }

.form-control-feedback {
  position: absolute;
  top: 0;
  right: 0;
  z-index: 2;
  display: block;
  width: 2rem;
  height: 2rem;
  line-height: 2rem;
  text-align: center;
  pointer-events: none; }

.input-lg + .form-control-feedback, .input-group-lg > .form-control + .form-control-feedback,
.input-group-lg > .input-group-addon + .form-control-feedback,
.input-group-lg > .input-group-btn > .btn + .form-control-feedback, .input-group-lg + .form-control-feedback, .form-group-lg .form-control + .form-control-feedback {
  width: 3rem;
  height: 3rem;
  line-height: 3rem; }

.input-sm + .form-control-feedback, .input-group-sm > .form-control + .form-control-feedback,
.input-group-sm > .input-group-addon + .form-control-feedback,
.input-group-sm > .input-group-btn > .btn + .form-control-feedback, .input-group-sm + .form-control-feedback, .form-group-sm .form-control + .form-control-feedback {
  width: 2rem;
  height: 2rem;
  line-height: 2rem; }

.has-success .help-block, .has-success .control-label, .has-success .radio, .has-success .checkbox, .has-success .radio-inline, .has-success .checkbox-inline, .has-success.radio label, .has-success.checkbox label, .has-success.radio-inline label, .has-success.checkbox-inline label {
  color: #19d9b4; }
.has-success .form-control {
  background-color: rgba(49, 193, 165, 0.35); }
  .has-success .form-control:focus {
    box-shadow: 0 2px 5px rgba(36, 42, 50, 0.05), 0 3px 8px rgba(25, 217, 180, 0.05); }
.has-success .input-group-addon {
  color: #19d9b4;
  border-color: #19d9b4;
  background-color: rgba(49, 193, 165, 0.35); }
.has-success .form-control-feedback {
  color: #19d9b4; }

.has-warning .help-block, .has-warning .control-label, .has-warning .radio, .has-warning .checkbox, .has-warning .radio-inline, .has-warning .checkbox-inline, .has-warning.radio label, .has-warning.checkbox label, .has-warning.radio-inline label, .has-warning.checkbox-inline label {
  color: #fe60a1; }
.has-warning .form-control {
  background-color: rgba(238, 112, 164, 0.35); }
  .has-warning .form-control:focus {
    box-shadow: 0 2px 5px rgba(36, 42, 50, 0.05), 0 3px 8px rgba(254, 96, 161, 0.05); }
.has-warning .input-group-addon {
  color: #fe60a1;
  border-color: #fe60a1;
  background-color: rgba(238, 112, 164, 0.35); }
.has-warning .form-control-feedback {
  color: #fe60a1; }

.has-error .help-block, .has-error .control-label, .has-error .radio, .has-error .checkbox, .has-error .radio-inline, .has-error .checkbox-inline, .has-error.radio label, .has-error.checkbox label, .has-error.radio-inline label, .has-error.checkbox-inline label {
  color: #fe60a1; }
.has-error .form-control {
  background-color: rgba(238, 112, 164, 0.35); }
  .has-error .form-control:focus {
    box-shadow: 0 2px 5px rgba(36, 42, 50, 0.05), 0 3px 8px rgba(254, 96, 161, 0.05); }
.has-error .input-group-addon {
  color: #fe60a1;
  border-color: #fe60a1;
  background-color: rgba(238, 112, 164, 0.35); }
.has-error .form-control-feedback {
  color: #fe60a1; }

.has-feedback label ~ .form-control-feedback {
  top: 24px; }
.has-feedback label.sr-only ~ .form-control-feedback {
  top: 0; }

.help-block {
  display: block;
  margin-top: 5px;
  margin-bottom: 10px;
  color: #bac3ce; }

@media (min-width: 740px) {
  .form-inline .form-group {
    display: inline-block;
    margin-bottom: 0;
    vertical-align: middle; }
  .form-inline .form-control {
    display: inline-block;
    width: auto;
    vertical-align: middle; }
  .form-inline .form-control-static {
    display: inline-block; }
  .form-inline .input-group {
    display: inline-table;
    vertical-align: middle; }
    .form-inline .input-group .input-group-addon, .form-inline .input-group .input-group-btn, .form-inline .input-group .form-control {
      width: auto; }
  .form-inline .input-group > .form-control {
    width: 100%; }
  .form-inline .control-label {
    margin-bottom: 0;
    vertical-align: middle; }
  .form-inline .radio, .form-inline .checkbox {
    display: inline-block;
    margin-top: 0;
    margin-bottom: 0;
    vertical-align: middle; }
    .form-inline .radio label, .form-inline .checkbox label {
      padding-left: 0; }
  .form-inline .radio input[type="radio"], .form-inline .checkbox input[type="checkbox"] {
    position: relative;
    margin-left: 0; }
  .form-inline .has-feedback .form-control-feedback {
    top: 0; } }

.form-horizontal .radio, .form-horizontal .checkbox, .form-horizontal .radio-inline, .form-horizontal .checkbox-inline {
  margin-top: 0;
  margin-bottom: 0;
  padding-top: 1.5rem; }
.form-horizontal .form-group {
  margin-left: -1rem;
  margin-right: -1rem; }
  .form-horizontal .form-group:before, .form-horizontal .form-group:after {
    content: " ";
    display: table; }
  .form-horizontal .form-group:after {
    clear: both; }
@media (min-width: 740px) {
  .form-horizontal .control-label {
    text-align: right;
    margin-bottom: 0;
    padding-top: 1.5rem; } }
.form-horizontal .has-feedback .form-control-feedback {
  right: 1rem; }
@media (min-width: 740px) {
  .form-horizontal .form-group-lg .control-label {
    padding-top: 1.75rem;
    font-size: 16px; } }
@media (min-width: 740px) {
  .form-horizontal .form-group-sm .control-label {
    padding-top: 1.25rem;
    font-size: 13px; } }

/* Bootstrap Buttons */
.btn {
  display: inline-block;
  margin-bottom: 0;
  font-weight: 600;
  text-align: center;
  vertical-align: middle;
  touch-action: manipulation;
  cursor: pointer;
  background-image: none;
  white-space: nowrap;
  line-height: 1.4;
  border-radius: 50rem;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; }
  .btn:focus, .btn.focus, .btn:active:focus, .btn:active.focus, .btn.active:focus, .btn.active.focus {
    outline: 0;
    outline-offset: 0; }
  .btn:hover, .btn:focus, .btn.focus {
    color: #333;
    text-decoration: none; }
  .btn.disabled, .btn[disabled], fieldset[disabled] .btn {
    cursor: not-allowed;
    opacity: 0.65;
    filter: alpha(opacity=65);
    box-shadow: none; }

a.btn.disabled, fieldset[disabled] a.btn {
  pointer-events: none; }

.btn-default {
  color: #333;
  background-color: #fff;
  border-color: #ccc; }
  .btn-default:focus, .btn-default.focus {
    color: #333;
    background-color: #e6e6e6;
    border-color: #8c8c8c; }
  .btn-default:hover {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad; }
  .btn-default:active, .btn-default.active, .open > .btn-default.dropdown-toggle {
    color: #333;
    background-color: #e6e6e6;
    border-color: #adadad; }
    .btn-default:active:hover, .btn-default:active:focus, .btn-default:active.focus, .btn-default.active:hover, .btn-default.active:focus, .btn-default.active.focus, .open > .btn-default.dropdown-toggle:hover, .open > .btn-default.dropdown-toggle:focus, .open > .btn-default.dropdown-toggle.focus {
      color: #333;
      background-color: #d4d4d4;
      border-color: #8c8c8c; }
  .btn-default:active, .btn-default.active, .open > .btn-default.dropdown-toggle {
    background-image: none; }
  .btn-default.disabled:hover, .btn-default.disabled:focus, .btn-default.disabled.focus, .btn-default[disabled]:hover, .btn-default[disabled]:focus, .btn-default[disabled].focus, fieldset[disabled] .btn-default:hover, fieldset[disabled] .btn-default:focus, fieldset[disabled] .btn-default.focus {
    background-color: #fff;
    border-color: #ccc; }
  .btn-default .badge {
    color: #fff;
    background-color: #333; }

.btn-primary {
  color: #fff;
  background-color: #8089ff;
  border-color: #6771ff; }
  .btn-primary:focus, .btn-primary.focus {
    color: #fff;
    background-color: #4d5aff;
    border-color: #0010e6; }
  .btn-primary:hover {
    color: #fff;
    background-color: #4d5aff;
    border-color: #2938ff; }
  .btn-primary:active, .btn-primary.active, .open > .btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #4d5aff;
    border-color: #2938ff; }
    .btn-primary:active:hover, .btn-primary:active:focus, .btn-primary:active.focus, .btn-primary.active:hover, .btn-primary.active:focus, .btn-primary.active.focus, .open > .btn-primary.dropdown-toggle:hover, .open > .btn-primary.dropdown-toggle:focus, .open > .btn-primary.dropdown-toggle.focus {
      color: #fff;
      background-color: #2938ff;
      border-color: #0010e6; }
  .btn-primary:active, .btn-primary.active, .open > .btn-primary.dropdown-toggle {
    background-image: none; }
  .btn-primary.disabled:hover, .btn-primary.disabled:focus, .btn-primary.disabled.focus, .btn-primary[disabled]:hover, .btn-primary[disabled]:focus, .btn-primary[disabled].focus, fieldset[disabled] .btn-primary:hover, fieldset[disabled] .btn-primary:focus, fieldset[disabled] .btn-primary.focus {
    background-color: #8089ff;
    border-color: #6771ff; }
  .btn-primary .badge {
    color: #8089ff;
    background-color: #fff; }

.btn-success {
  color: #fff;
  background-color: #19d9b4;
  border-color: #16c2a1; }
  .btn-success:focus, .btn-success.focus {
    color: #fff;
    background-color: #14ab8e;
    border-color: #095042; }
  .btn-success:hover {
    color: #fff;
    background-color: #14ab8e;
    border-color: #108b74; }
  .btn-success:active, .btn-success.active, .open > .btn-success.dropdown-toggle {
    color: #fff;
    background-color: #14ab8e;
    border-color: #108b74; }
    .btn-success:active:hover, .btn-success:active:focus, .btn-success:active.focus, .btn-success.active:hover, .btn-success.active:focus, .btn-success.active.focus, .open > .btn-success.dropdown-toggle:hover, .open > .btn-success.dropdown-toggle:focus, .open > .btn-success.dropdown-toggle.focus {
      color: #fff;
      background-color: #108b74;
      border-color: #095042; }
  .btn-success:active, .btn-success.active, .open > .btn-success.dropdown-toggle {
    background-image: none; }
  .btn-success.disabled:hover, .btn-success.disabled:focus, .btn-success.disabled.focus, .btn-success[disabled]:hover, .btn-success[disabled]:focus, .btn-success[disabled].focus, fieldset[disabled] .btn-success:hover, fieldset[disabled] .btn-success:focus, fieldset[disabled] .btn-success.focus {
    background-color: #19d9b4;
    border-color: #16c2a1; }
  .btn-success .badge {
    color: #19d9b4;
    background-color: #fff; }

.btn-info {
  color: #fff;
  background-color: #84ce65;
  border-color: #75c852; }
  .btn-info:focus, .btn-info.focus {
    color: #fff;
    background-color: #65c23e;
    border-color: #3d7525; }
  .btn-info:hover {
    color: #fff;
    background-color: #65c23e;
    border-color: #57a735; }
  .btn-info:active, .btn-info.active, .open > .btn-info.dropdown-toggle {
    color: #fff;
    background-color: #65c23e;
    border-color: #57a735; }
    .btn-info:active:hover, .btn-info:active:focus, .btn-info:active.focus, .btn-info.active:hover, .btn-info.active:focus, .btn-info.active.focus, .open > .btn-info.dropdown-toggle:hover, .open > .btn-info.dropdown-toggle:focus, .open > .btn-info.dropdown-toggle.focus {
      color: #fff;
      background-color: #57a735;
      border-color: #3d7525; }
  .btn-info:active, .btn-info.active, .open > .btn-info.dropdown-toggle {
    background-image: none; }
  .btn-info.disabled:hover, .btn-info.disabled:focus, .btn-info.disabled.focus, .btn-info[disabled]:hover, .btn-info[disabled]:focus, .btn-info[disabled].focus, fieldset[disabled] .btn-info:hover, fieldset[disabled] .btn-info:focus, fieldset[disabled] .btn-info.focus {
    background-color: #84ce65;
    border-color: #75c852; }
  .btn-info .badge {
    color: #84ce65;
    background-color: #fff; }

.btn-warning {
  color: #fff;
  background-color: #ff8765;
  border-color: #ff734c; }
  .btn-warning:focus, .btn-warning.focus {
    color: #fff;
    background-color: #ff5f32;
    border-color: #cb2d00; }
  .btn-warning:hover {
    color: #fff;
    background-color: #ff5f32;
    border-color: #ff430e; }
  .btn-warning:active, .btn-warning.active, .open > .btn-warning.dropdown-toggle {
    color: #fff;
    background-color: #ff5f32;
    border-color: #ff430e; }
    .btn-warning:active:hover, .btn-warning:active:focus, .btn-warning:active.focus, .btn-warning.active:hover, .btn-warning.active:focus, .btn-warning.active.focus, .open > .btn-warning.dropdown-toggle:hover, .open > .btn-warning.dropdown-toggle:focus, .open > .btn-warning.dropdown-toggle.focus {
      color: #fff;
      background-color: #ff430e;
      border-color: #cb2d00; }
  .btn-warning:active, .btn-warning.active, .open > .btn-warning.dropdown-toggle {
    background-image: none; }
  .btn-warning.disabled:hover, .btn-warning.disabled:focus, .btn-warning.disabled.focus, .btn-warning[disabled]:hover, .btn-warning[disabled]:focus, .btn-warning[disabled].focus, fieldset[disabled] .btn-warning:hover, fieldset[disabled] .btn-warning:focus, fieldset[disabled] .btn-warning.focus {
    background-color: #ff8765;
    border-color: #ff734c; }
  .btn-warning .badge {
    color: #ff8765;
    background-color: #fff; }

.btn-danger {
  color: #fff;
  background-color: #fe60a1;
  border-color: #fe4792; }
  .btn-danger:focus, .btn-danger.focus {
    color: #fff;
    background-color: #fe2d83;
    border-color: #c40151; }
  .btn-danger:hover {
    color: #fff;
    background-color: #fe2d83;
    border-color: #fd0a6e; }
  .btn-danger:active, .btn-danger.active, .open > .btn-danger.dropdown-toggle {
    color: #fff;
    background-color: #fe2d83;
    border-color: #fd0a6e; }
    .btn-danger:active:hover, .btn-danger:active:focus, .btn-danger:active.focus, .btn-danger.active:hover, .btn-danger.active:focus, .btn-danger.active.focus, .open > .btn-danger.dropdown-toggle:hover, .open > .btn-danger.dropdown-toggle:focus, .open > .btn-danger.dropdown-toggle.focus {
      color: #fff;
      background-color: #fd0a6e;
      border-color: #c40151; }
  .btn-danger:active, .btn-danger.active, .open > .btn-danger.dropdown-toggle {
    background-image: none; }
  .btn-danger.disabled:hover, .btn-danger.disabled:focus, .btn-danger.disabled.focus, .btn-danger[disabled]:hover, .btn-danger[disabled]:focus, .btn-danger[disabled].focus, fieldset[disabled] .btn-danger:hover, fieldset[disabled] .btn-danger:focus, fieldset[disabled] .btn-danger.focus {
    background-color: #fe60a1;
    border-color: #fe4792; }
  .btn-danger .badge {
    color: #fe60a1;
    background-color: #fff; }

.btn-link {
  color: #8089ff;
  font-weight: normal;
  border-radius: 0; }
  .btn-link, .btn-link:active, .btn-link.active, .btn-link[disabled], fieldset[disabled] .btn-link {
    background-color: transparent;
    box-shadow: none; }
  .btn-link, .btn-link:hover, .btn-link:focus, .btn-link:active {
    border-color: transparent; }
  .btn-link:hover, .btn-link:focus {
    color: #3442ff;
    text-decoration: none;
    background-color: transparent; }
  .btn-link[disabled]:hover, .btn-link[disabled]:focus, fieldset[disabled] .btn-link:hover, fieldset[disabled] .btn-link:focus {
    color: #8e9bae;
    text-decoration: none; }

.btn-lg, .btn-group-lg > .btn {
  line-height: 1.33333;
  border-radius: 50rem; }

.btn-sm, .btn-group-sm > .btn {
  line-height: 1.75;
  border-radius: 50rem; }

.btn-xs, .btn-group-xs > .btn {
  line-height: 1.5;
  border-radius: 50rem; }

.btn-block {
  display: block;
  width: 100%; }

.btn-block + .btn-block {
  margin-top: 5px; }

input[type="submit"].btn-block,
input[type="reset"].btn-block,
input[type="button"].btn-block {
  width: 100%; }

.fade {
  opacity: 0;
  -webkit-transition: opacity 0.15s linear;
  transition: opacity 0.15s linear; }
  .fade.in {
    opacity: 1; }

.collapse {
  display: none; }
  .collapse.in {
    display: block; }

tr.collapse.in {
  display: table-row; }

tbody.collapse.in {
  display: table-row-group; }

.collapsing {
  position: relative;
  height: 0;
  overflow: hidden;
  -webkit-transition-property: height, visibility;
  transition-property: height, visibility;
  -webkit-transition-duration: 0.35s;
  transition-duration: 0.35s;
  -webkit-transition-timing-function: ease;
  transition-timing-function: ease; }

.caret {
  display: inline-block;
  width: 0;
  height: 0;
  margin-left: 2px;
  vertical-align: middle;
  border-top: 4px dashed;
  border-top: 4px solid \9;
  border-right: 4px solid transparent;
  border-left: 4px solid transparent; }

.dropup,
.dropdown {
  position: relative; }

.dropdown-toggle:focus {
  outline: 0; }

.dropdown-menu {
  position: absolute;
  top: 100%;
  left: 0;
  z-index: 9;
  display: none;
  float: left;
  min-width: 160px;
  padding: .75rem 0;
  margin: 2px 0 0;
  list-style: none;
  text-align: left;
  background-color: #fff;
  border-radius: 0.5rem;
  background-clip: padding-box; }
  .dropdown-menu.pull-right {
    right: 0;
    left: auto; }
  .dropdown-menu .divider {
    height: 1px;
    margin: 8.5px 0;
    overflow: hidden;
    background-color: #d8dde3; }
  .dropdown-menu > li > a {
    display: block;
    padding: .5rem 1.5rem;
    clear: both;
    font-weight: normal;
    line-height: 1.4;
    color: #708198;
    white-space: nowrap; }

.dropdown-menu > li > a:hover, .dropdown-menu > li > a:focus {
  text-decoration: none;
  color: #708198;
  background-color: #f6f7f8; }

.dropdown-menu > .active > a, .dropdown-menu > .active > a:hover, .dropdown-menu > .active > a:focus {
  color: #FFF;
  text-decoration: none;
  outline: 0;
  background-color: #8089ff; }

.dropdown-menu > .disabled > a, .dropdown-menu > .disabled > a:hover, .dropdown-menu > .disabled > a:focus {
  color: #8e9bae; }
.dropdown-menu > .disabled > a:hover, .dropdown-menu > .disabled > a:focus {
  text-decoration: none;
  background-color: transparent;
  background-image: none;
  filter: progid:DXImageTransform.Microsoft.gradient(enabled = false);
  cursor: not-allowed; }

.open > .dropdown-menu {
  display: block; }
.open > a {
  outline: 0; }

.dropdown-menu-right {
  left: auto;
  right: 0; }

.dropdown-menu-left {
  left: 0;
  right: auto; }

.dropdown-header {
  display: block;
  padding: .5rem 1.5rem;
  font-size: 13px;
  line-height: 1.4;
  color: #8e9bae;
  white-space: nowrap; }

.dropdown-backdrop {
  position: fixed;
  left: 0;
  right: 0;
  bottom: 0;
  top: 0;
  z-index: -1; }

.pull-right > .dropdown-menu {
  right: 0;
  left: auto; }

.dropup .caret,
.navbar-fixed-bottom .dropdown .caret {
  border-top: 0;
  border-bottom: 4px dashed;
  border-bottom: 4px solid \9;
  content: ""; }
.dropup .dropdown-menu,
.navbar-fixed-bottom .dropdown .dropdown-menu {
  top: auto;
  bottom: 100%;
  margin-bottom: 2px; }

@media (min-width: 740px) {
  .navbar-right .dropdown-menu {
    right: 0;
    left: auto; }
  .navbar-right .dropdown-menu-left {
    left: 0;
    right: auto; } }
.btn-group,
.btn-group-vertical {
  position: relative;
  display: inline-block;
  vertical-align: middle; }
  .btn-group > .btn,
  .btn-group-vertical > .btn {
    position: relative;
    float: left; }
    .btn-group > .btn:hover, .btn-group > .btn:focus, .btn-group > .btn:active, .btn-group > .btn.active,
    .btn-group-vertical > .btn:hover,
    .btn-group-vertical > .btn:focus,
    .btn-group-vertical > .btn:active,
    .btn-group-vertical > .btn.active {
      z-index: 2; }

.btn-group .btn + .btn,
.btn-group .btn + .btn-group,
.btn-group .btn-group + .btn,
.btn-group .btn-group + .btn-group {
  margin-left: -1px; }

.btn-toolbar {
  margin-left: -5px; }
  .btn-toolbar:before, .btn-toolbar:after {
    content: " ";
    display: table; }
  .btn-toolbar:after {
    clear: both; }
  .btn-toolbar .btn,
  .btn-toolbar .btn-group,
  .btn-toolbar .input-group {
    float: left; }
  .btn-toolbar > .btn,
  .btn-toolbar > .btn-group,
  .btn-toolbar > .input-group {
    margin-left: 5px; }

.btn-group > .btn:not(:first-child):not(:last-child):not(.dropdown-toggle) {
  border-radius: 0; }

.btn-group > .btn:first-child {
  margin-left: 0; }
  .btn-group > .btn:first-child:not(:last-child):not(.dropdown-toggle) {
    border-bottom-right-radius: 0;
    border-top-right-radius: 0; }

.btn-group > .btn:last-child:not(:first-child),
.btn-group > .dropdown-toggle:not(:first-child) {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0; }

.btn-group > .btn-group {
  float: left; }

.btn-group > .btn-group:not(:first-child):not(:last-child) > .btn {
  border-radius: 0; }

.btn-group > .btn-group:first-child:not(:last-child) > .btn:last-child,
.btn-group > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
  border-bottom-right-radius: 0;
  border-top-right-radius: 0; }

.btn-group > .btn-group:last-child:not(:first-child) > .btn:first-child {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0; }

.btn-group .dropdown-toggle:active,
.btn-group.open .dropdown-toggle {
  outline: 0; }

.btn-group > .btn + .dropdown-toggle {
  padding-left: 8px;
  padding-right: 8px; }

.btn-group > .btn-lg + .dropdown-toggle, .btn-group-lg.btn-group > .btn + .dropdown-toggle {
  padding-left: 12px;
  padding-right: 12px; }

.btn-group.open .dropdown-toggle {
  box-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125); }
  .btn-group.open .dropdown-toggle.btn-link {
    box-shadow: none; }

.btn .caret {
  margin-left: 0; }

.btn-lg .caret, .btn-group-lg > .btn .caret {
  border-width: 5px 5px 0;
  border-bottom-width: 0; }

.dropup .btn-lg .caret, .dropup .btn-group-lg > .btn .caret {
  border-width: 0 5px 5px; }

.btn-group-vertical > .btn,
.btn-group-vertical > .btn-group,
.btn-group-vertical > .btn-group > .btn {
  display: block;
  float: none;
  width: 100%;
  max-width: 100%; }
.btn-group-vertical > .btn-group:before, .btn-group-vertical > .btn-group:after {
  content: " ";
  display: table; }
.btn-group-vertical > .btn-group:after {
  clear: both; }
.btn-group-vertical > .btn-group > .btn {
  float: none; }
.btn-group-vertical > .btn + .btn,
.btn-group-vertical > .btn + .btn-group,
.btn-group-vertical > .btn-group + .btn,
.btn-group-vertical > .btn-group + .btn-group {
  margin-top: -1px;
  margin-left: 0; }

.btn-group-vertical > .btn:not(:first-child):not(:last-child) {
  border-radius: 0; }
.btn-group-vertical > .btn:first-child:not(:last-child) {
  border-top-right-radius: 50rem;
  border-top-left-radius: 50rem;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0; }
.btn-group-vertical > .btn:last-child:not(:first-child) {
  border-top-right-radius: 0;
  border-top-left-radius: 0;
  border-bottom-right-radius: 50rem;
  border-bottom-left-radius: 50rem; }

.btn-group-vertical > .btn-group:not(:first-child):not(:last-child) > .btn {
  border-radius: 0; }

.btn-group-vertical > .btn-group:first-child:not(:last-child) > .btn:last-child,
.btn-group-vertical > .btn-group:first-child:not(:last-child) > .dropdown-toggle {
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0; }

.btn-group-vertical > .btn-group:last-child:not(:first-child) > .btn:first-child {
  border-top-right-radius: 0;
  border-top-left-radius: 0; }

.btn-group-justified {
  display: table;
  width: 100%;
  table-layout: fixed;
  border-collapse: separate; }
  .btn-group-justified > .btn,
  .btn-group-justified > .btn-group {
    float: none;
    display: table-cell;
    width: 1%; }
  .btn-group-justified > .btn-group .btn {
    width: 100%; }
  .btn-group-justified > .btn-group .dropdown-menu {
    left: auto; }

[data-toggle="buttons"] > .btn input[type="radio"],
[data-toggle="buttons"] > .btn input[type="checkbox"],
[data-toggle="buttons"] > .btn-group > .btn input[type="radio"],
[data-toggle="buttons"] > .btn-group > .btn input[type="checkbox"] {
  position: absolute;
  clip: rect(0, 0, 0, 0);
  pointer-events: none; }

.input-group {
  position: relative;
  display: table;
  border-collapse: separate; }
  .input-group[class*="col-"] {
    float: none;
    padding-left: 0;
    padding-right: 0; }
  .input-group .form-control {
    position: relative;
    z-index: 2;
    float: left;
    width: 100%;
    margin-bottom: 0; }
    .input-group .form-control:focus {
      z-index: 3; }

.input-group-addon,
.input-group-btn,
.input-group .form-control {
  display: table-cell; }
  .input-group-addon:not(:first-child):not(:last-child),
  .input-group-btn:not(:first-child):not(:last-child),
  .input-group .form-control:not(:first-child):not(:last-child) {
    border-radius: 0; }

.input-group-addon,
.input-group-btn {
  width: 1%;
  white-space: nowrap;
  vertical-align: middle; }

.input-group-addon {
  padding: 0.5rem 1rem;
  font-size: 14px;
  font-weight: normal;
  line-height: 1;
  color: #708198;
  text-align: center;
  background-color: #f6f7f8;
  border: 0;
  border-radius: 0.25rem; }
  .input-group-addon.input-sm,
  .input-group-sm > .input-group-addon,
  .input-group-sm > .input-group-btn > .input-group-addon.btn {
    padding: 0.25rem 0.75rem;
    font-size: 13px;
    border-radius: 0.25rem; }
  .input-group-addon.input-lg,
  .input-group-lg > .input-group-addon,
  .input-group-lg > .input-group-btn > .input-group-addon.btn {
    padding: 0.75rem 1.5rem;
    font-size: 16px;
    border-radius: 0.25rem; }
  .input-group-addon input[type="radio"],
  .input-group-addon input[type="checkbox"] {
    margin-top: 0; }

.input-group .form-control:first-child,
.input-group-addon:first-child,
.input-group-btn:first-child > .btn,
.input-group-btn:first-child > .btn-group > .btn,
.input-group-btn:first-child > .dropdown-toggle,
.input-group-btn:last-child > .btn:not(:last-child):not(.dropdown-toggle),
.input-group-btn:last-child > .btn-group:not(:last-child) > .btn {
  border-bottom-right-radius: 0;
  border-top-right-radius: 0; }

.input-group-addon:first-child {
  border-right: 0; }

.input-group .form-control:last-child,
.input-group-addon:last-child,
.input-group-btn:last-child > .btn,
.input-group-btn:last-child > .btn-group > .btn,
.input-group-btn:last-child > .dropdown-toggle,
.input-group-btn:first-child > .btn:not(:first-child),
.input-group-btn:first-child > .btn-group:not(:first-child) > .btn {
  border-bottom-left-radius: 0;
  border-top-left-radius: 0; }

.input-group-addon:last-child {
  border-left: 0; }

.input-group-btn {
  position: relative;
  font-size: 0;
  white-space: nowrap; }
  .input-group-btn > .btn {
    margin-top: 0;
    position: relative; }
    .input-group-btn > .btn + .btn {
      margin-left: -1px; }
    .input-group-btn > .btn:hover, .input-group-btn > .btn:focus, .input-group-btn > .btn:active {
      z-index: 2; }
  .input-group-btn:first-child > .btn,
  .input-group-btn:first-child > .btn-group {
    margin-right: -1px; }
  .input-group-btn:last-child > .btn,
  .input-group-btn:last-child > .btn-group {
    z-index: 2;
    margin-left: -1px; }

.nav {
  margin-bottom: 0;
  padding-left: 0;
  list-style: none; }
  .nav:before, .nav:after {
    content: " ";
    display: table; }
  .nav:after {
    clear: both; }
  .nav > li {
    position: relative;
    display: block; }
    .nav > li > a {
      position: relative;
      display: block;
      padding: 10px 15px; }
      .nav > li > a:hover, .nav > li > a:focus {
        text-decoration: none; }
    .nav > li.disabled > a {
      color: #8e9bae; }
      .nav > li.disabled > a:hover, .nav > li.disabled > a:focus {
        color: #8e9bae;
        text-decoration: none;
        cursor: not-allowed; }
  .nav .open > a, .nav .open > a:hover, .nav .open > a:focus {
    border-color: #8089ff; }
  .nav .nav-divider {
    height: 1px;
    margin: 8.5px 0;
    overflow: hidden;
    background-color: #e5e5e5; }
  .nav > li > a > img {
    max-width: none; }

.nav-tabs > li {
  float: left;
  margin-bottom: -1px; }
  .nav-tabs > li > a {
    margin-right: 2px;
    line-height: 1.4; }
  .nav-tabs > li.active > a, .nav-tabs > li.active > a:hover, .nav-tabs > li.active > a:focus {
    cursor: default; }

.nav-pills > li {
  float: left; }
  .nav-pills > li > a {
    border-radius: 0.5rem; }
  .nav-pills > li + li {
    margin-left: 2px; }
  .nav-pills > li.active > a, .nav-pills > li.active > a:hover, .nav-pills > li.active > a:focus {
    color: #fff; }

.nav-stacked > li {
  float: none; }
  .nav-stacked > li + li {
    margin-top: 2px;
    margin-left: 0; }

.nav-justified, .nav-tabs.nav-justified {
  width: 100%; }
  .nav-justified > li, .nav-tabs.nav-justified > li {
    float: none; }
    .nav-justified > li > a, .nav-tabs.nav-justified > li > a {
      text-align: center;
      margin-bottom: 5px; }
  .nav-justified > .dropdown .dropdown-menu {
    top: auto;
    left: auto; }
  @media (min-width: 740px) {
    .nav-justified > li, .nav-tabs.nav-justified > li {
      display: table-cell;
      width: 1%; }
      .nav-justified > li > a, .nav-tabs.nav-justified > li > a {
        margin-bottom: 0; } }

.nav-tabs-justified, .nav-tabs.nav-justified {
  border-bottom: 0; }
  .nav-tabs-justified > li > a, .nav-tabs.nav-justified > li > a {
    margin-right: 0; }

.tab-content > .tab-pane {
  display: none; }
.tab-content > .active {
  display: block; }

.nav-tabs .dropdown-menu {
  margin-top: -1px;
  border-top-right-radius: 0;
  border-top-left-radius: 0; }

/* Bootsrap Navbar */
.navbar {
  position: absolute;
  min-height: 60px; }
  .navbar:before, .navbar:after {
    content: " ";
    display: table; }
  .navbar:after {
    clear: both; }

.navbar-fixed-top {
  position: absolute;
  top: 0;


  z-index: 9;
  }

.navbar-brand {
  float: left;
  padding: 20.5px 1rem;
  font-size: 16px;
  line-height: 19px;
  height: 75px; }
  .navbar-brand:hover, .navbar-brand:focus {
    text-decoration: none; }
  .navbar-brand > img {
    display: block; }
  @media (min-width: 740px) {
    .navbar > .container .navbar-brand, .navbar > .container-fluid .navbar-brand {
      margin-left: -1rem; } }

@media (min-width: 740px) {
  .navbar-nav {
    margin: 10.25px -1rem; } }
.navbar-nav > li > a {
  padding-top: 10px;
  padding-bottom: 10px;
  line-height: 19px; }
@media (max-width: 739px) {
	.boxpack{
		margin-bottom:20px;}
		.certi img{
			width:100%;}
			.ui-icon-blocks .ui-icon-block {
    position: relative;
    margin-bottom: 2rem !important;
}
.ui-icon-blocks.icons-lg.ui-blocks-v .icon {
    left: -5rem;
    top: 0.5rem !important;
}
  .navbar-nav .open .dropdown-menu {
    position: static;
    float: none;
    width: auto;
    margin-top: 0; }
    .navbar-nav .open .dropdown-menu > li > a, .navbar-nav .open .dropdown-menu .dropdown-header {
      padding: 5px 15px 5px 25px; }
    .navbar-nav .open .dropdown-menu > li > a {
      line-height: 19px; }
      .navbar-nav .open .dropdown-menu > li > a:hover, .navbar-nav .open .dropdown-menu > li > a:focus {
        background-image: none; } }
@media (min-width: 740px) {
  .navbar-nav {
    float: left;
    margin: 0; }
    .navbar-nav > li {
      float: left; }
      .navbar-nav > li > a {
        padding-top: 20.5px;
        padding-bottom: 20.5px; } }

.navbar-fixed-bottom .navbar-nav > li > .dropdown-menu {
  margin-bottom: 0; }

@media (min-width: 740px) {
  .navbar-left {
    float: left !important; }

  .navbar-right {
    float: right !important;
    margin-right: 0;
	margin-top:24px;}
    .navbar-right ~ .navbar-right {
      margin-right: 0; } }
.navbar-default {
  background-color: transparent; }
  .navbar-default .navbar-brand {
    color: #8089ff; }
    .navbar-default .navbar-brand:hover, .navbar-default .navbar-brand:focus {
      color: #8089ff; }
  .navbar-default .navbar-text {
    color: #414c5a; }
  .navbar-default .navbar-nav > li > a {
    color: #414c5a; }
    .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
      color: #8089ff; }
  .navbar-default .navbar-nav > .active > a, .navbar-default .navbar-nav > .active > a:hover, .navbar-default .navbar-nav > .active > a:focus {
    color: #8089ff; }
  .navbar-default .navbar-nav > .disabled > a, .navbar-default .navbar-nav > .disabled > a:hover, .navbar-default .navbar-nav > .disabled > a:focus {
    color: #f6f7f8; }
  .navbar-default .navbar-link {
    color: #414c5a; }
    .navbar-default .navbar-link:hover {
      color: #8089ff; }
  .navbar-default .btn-link {
    color: #414c5a; }
    .navbar-default .btn-link:hover, .navbar-default .btn-link:focus {
      color: #8089ff; }
    .navbar-default .btn-link[disabled]:hover, .navbar-default .btn-link[disabled]:focus, fieldset[disabled] .navbar-default .btn-link:hover, fieldset[disabled] .navbar-default .btn-link:focus {
      color: #f6f7f8; }

.navbar-inverse {
  background-color: #414c5a; }
  .navbar-inverse .navbar-brand {
    color: #fff; }
    .navbar-inverse .navbar-brand:hover, .navbar-inverse .navbar-brand:focus {
      color: #fff; }
  .navbar-inverse .navbar-text {
    color: #FFF; }
  .navbar-inverse .navbar-nav > li > a {
    color: rgba(255, 255, 255, 0.75); }
    .navbar-inverse .navbar-nav > li > a:hover, .navbar-inverse .navbar-nav > li > a:focus {
      color: #fff; }
  .navbar-inverse .navbar-nav > .active > a, .navbar-inverse .navbar-nav > .active > a:hover, .navbar-inverse .navbar-nav > .active > a:focus {
    color: #fff; }
  .navbar-inverse .navbar-nav > .disabled > a, .navbar-inverse .navbar-nav > .disabled > a:hover, .navbar-inverse .navbar-nav > .disabled > a:focus {
    color: #444; }
  .navbar-inverse .navbar-collapse, .navbar-inverse .navbar-form {
    border-color: #323a45; }
  .navbar-inverse .navbar-link {
    color: rgba(255, 255, 255, 0.75); }
    .navbar-inverse .navbar-link:hover {
      color: #fff; }
  .navbar-inverse .btn-link {
    color: rgba(255, 255, 255, 0.75); }
    .navbar-inverse .btn-link:hover, .navbar-inverse .btn-link:focus {
      color: #fff; }
    .navbar-inverse .btn-link[disabled]:hover, .navbar-inverse .btn-link[disabled]:focus, fieldset[disabled] .navbar-inverse .btn-link:hover, fieldset[disabled] .navbar-inverse .btn-link:focus {
      color: #444; }

.pagination {
  display: inline-block;
  padding-left: 0;
  margin: 19px 0;
  border-radius: 0.5rem; }
  .pagination > li {
    display: inline; }
    .pagination > li > a,
    .pagination > li > span {
      position: relative;
      float: left;
      padding: 0.5rem 1rem;
      line-height: 1.4;
      text-decoration: none;
      color: #8089ff;
      background-color: #fff;
      border: 1px solid #ddd;
      margin-left: -1px; }
    .pagination > li:first-child > a,
    .pagination > li:first-child > span {
      margin-left: 0;
      border-bottom-left-radius: 0.5rem;
      border-top-left-radius: 0.5rem; }
    .pagination > li:last-child > a,
    .pagination > li:last-child > span {
      border-bottom-right-radius: 0.5rem;
      border-top-right-radius: 0.5rem; }
  .pagination > li > a:hover, .pagination > li > a:focus,
  .pagination > li > span:hover,
  .pagination > li > span:focus {
    z-index: 2;
    color: #3442ff;
    background-color: #f6f7f8;
    border-color: #ddd; }
  .pagination > .active > a, .pagination > .active > a:hover, .pagination > .active > a:focus,
  .pagination > .active > span,
  .pagination > .active > span:hover,
  .pagination > .active > span:focus {
    z-index: 3;
    color: #fff;
    background-color: #8089ff;
    border-color: #8089ff;
    cursor: default; }
  .pagination > .disabled > span,
  .pagination > .disabled > span:hover,
  .pagination > .disabled > span:focus,
  .pagination > .disabled > a,
  .pagination > .disabled > a:hover,
  .pagination > .disabled > a:focus {
    color: #8e9bae;
    background-color: #fff;
    border-color: #ddd;
    cursor: not-allowed; }

.pagination-lg > li > a,
.pagination-lg > li > span {
  padding: 0.75rem 1.5rem;
  font-size: 16px;
  line-height: 1.33333; }
.pagination-lg > li:first-child > a,
.pagination-lg > li:first-child > span {
  border-bottom-left-radius: 1.25rem;
  border-top-left-radius: 1.25rem; }
.pagination-lg > li:last-child > a,
.pagination-lg > li:last-child > span {
  border-bottom-right-radius: 1.25rem;
  border-top-right-radius: 1.25rem; }

.pagination-sm > li > a,
.pagination-sm > li > span {
  padding: 0.25rem 0.75rem;
  font-size: 13px;
  line-height: 1.5; }
.pagination-sm > li:first-child > a,
.pagination-sm > li:first-child > span {
  border-bottom-left-radius: 0.25rem;
  border-top-left-radius: 0.25rem; }
.pagination-sm > li:last-child > a,
.pagination-sm > li:last-child > span {
  border-bottom-right-radius: 0.25rem;
  border-top-right-radius: 0.25rem; }

.pager {
  padding-left: 0;
  margin: 19px 0;
  list-style: none;
  text-align: center; }
  .pager:before, .pager:after {
    content: " ";
    display: table; }
  .pager:after {
    clear: both; }
  .pager li {
    display: inline; }
    .pager li > a,
    .pager li > span {
      display: inline-block;
      padding: 5px 14px;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 15px; }
    .pager li > a:hover,
    .pager li > a:focus {
      text-decoration: none;
      background-color: #f6f7f8; }
  .pager .next > a,
  .pager .next > span {
    float: right; }
  .pager .previous > a,
  .pager .previous > span {
    float: left; }
  .pager .disabled > a,
  .pager .disabled > a:hover,
  .pager .disabled > a:focus,
  .pager .disabled > span {
    color: #8e9bae;
    background-color: #fff;
    cursor: not-allowed; }

.tooltip {
  position: absolute;
  z-index: 11;
  display: block;
  font-family: 'Nunito', sans-serif;
  font-style: normal;
  font-weight: normal;
  letter-spacing: normal;
  line-break: auto;
  line-height: 1.4;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  white-space: normal;
  word-break: normal;
  word-spacing: normal;
  word-wrap: normal;
  font-size: 13px;
  opacity: 0;
  filter: alpha(opacity=0); }
  .tooltip.in {
    opacity: 0.9;
    filter: alpha(opacity=90); }
  .tooltip.top {
    margin-top: -3px;
    padding: 5px 0; }
  .tooltip.right {
    margin-left: 3px;
    padding: 0 5px; }
  .tooltip.bottom {
    margin-top: 3px;
    padding: 5px 0; }
  .tooltip.left {
    margin-left: -3px;
    padding: 0 5px; }

.tooltip-inner {
  max-width: 200px;
  padding: 3px 8px;
  color: #fff;
  text-align: center;
  background-color: #000;
  border-radius: 0.5rem; }

.tooltip-arrow {
  position: absolute;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid; }

.tooltip.top .tooltip-arrow {
  bottom: 0;
  left: 50%;
  margin-left: -5px;
  border-width: 5px 5px 0;
  border-top-color: #000; }
.tooltip.top-left .tooltip-arrow {
  bottom: 0;
  right: 5px;
  margin-bottom: -5px;
  border-width: 5px 5px 0;
  border-top-color: #000; }
.tooltip.top-right .tooltip-arrow {
  bottom: 0;
  left: 5px;
  margin-bottom: -5px;
  border-width: 5px 5px 0;
  border-top-color: #000; }
.tooltip.right .tooltip-arrow {
  top: 50%;
  left: 0;
  margin-top: -5px;
  border-width: 5px 5px 5px 0;
  border-right-color: #000; }
.tooltip.left .tooltip-arrow {
  top: 50%;
  right: 0;
  margin-top: -5px;
  border-width: 5px 0 5px 5px;
  border-left-color: #000; }
.tooltip.bottom .tooltip-arrow {
  top: 0;
  left: 50%;
  margin-left: -5px;
  border-width: 0 5px 5px;
  border-bottom-color: #000; }
.tooltip.bottom-left .tooltip-arrow {
  top: 0;
  right: 5px;
  margin-top: -5px;
  border-width: 0 5px 5px;
  border-bottom-color: #000; }
.tooltip.bottom-right .tooltip-arrow {
  top: 0;
  left: 5px;
  margin-top: -5px;
  border-width: 0 5px 5px;
  border-bottom-color: #000; }

.popover {
  position: absolute;
  top: 0;
  left: 0;
  z-index: 10;
  display: none;
  max-width: 276px;
  padding: 1px;
  font-family: 'Nunito', sans-serif;
  font-style: normal;
  font-weight: normal;
  letter-spacing: normal;
  line-break: auto;
  line-height: 1.4;
  text-align: left;
  text-align: start;
  text-decoration: none;
  text-shadow: none;
  text-transform: none;
  white-space: normal;
  word-break: normal;
  word-spacing: normal;
  word-wrap: normal;
  font-size: 14px;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid #ccc;
  border: 1px solid rgba(0, 0, 0, 0.2);
  border-radius: 1.25rem;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2); }
  .popover.top {
    margin-top: -10px; }
  .popover.right {
    margin-left: 10px; }
  .popover.bottom {
    margin-top: 10px; }
  .popover.left {
    margin-left: -10px; }

.popover-title {
  margin: 0;
  padding: 8px 14px;
  font-size: 14px;
  background-color: #f7f7f7;
  border-bottom: 1px solid #ebebeb;
  border-radius: 0.25rem 0.25rem 0 0; }

.popover-content {
  padding: 9px 14px; }

.popover > .arrow, .popover > .arrow:after {
  position: absolute;
  display: block;
  width: 0;
  height: 0;
  border-color: transparent;
  border-style: solid; }

.popover > .arrow {
  border-width: 11px; }

.popover > .arrow:after {
  border-width: 10px;
  content: ""; }

.popover.top > .arrow {
  left: 50%;
  margin-left: -11px;
  border-bottom-width: 0;
  border-top-color: #999999;
  border-top-color: rgba(0, 0, 0, 0.25);
  bottom: -11px; }
  .popover.top > .arrow:after {
    content: " ";
    bottom: 1px;
    margin-left: -10px;
    border-bottom-width: 0;
    border-top-color: #fff; }
.popover.right > .arrow {
  top: 50%;
  left: -11px;
  margin-top: -11px;
  border-left-width: 0;
  border-right-color: #999999;
  border-right-color: rgba(0, 0, 0, 0.25); }
  .popover.right > .arrow:after {
    content: " ";
    left: 1px;
    bottom: -10px;
    border-left-width: 0;
    border-right-color: #fff; }
.popover.bottom > .arrow {
  left: 50%;
  margin-left: -11px;
  border-top-width: 0;
  border-bottom-color: #999999;
  border-bottom-color: rgba(0, 0, 0, 0.25);
  top: -11px; }
  .popover.bottom > .arrow:after {
    content: " ";
    top: 1px;
    margin-left: -10px;
    border-top-width: 0;
    border-bottom-color: #fff; }
.popover.left > .arrow {
  top: 50%;
  right: -11px;
  margin-top: -11px;
  border-right-width: 0;
  border-left-color: #999999;
  border-left-color: rgba(0, 0, 0, 0.25); }
  .popover.left > .arrow:after {
    content: " ";
    right: 1px;
    border-right-width: 0;
    border-left-color: #fff;
    bottom: -10px; }

.clearfix:before, .clearfix:after {
  content: " ";
  display: table; }
.clearfix:after {
  clear: both; }

.center-block {
  display: block;
  margin-left: auto;
  margin-right: auto; }

.pull-right {
  float: right !important; }

.pull-left {
  float: left !important; }

.hide {
  display: none !important; }

.show {
  display: block !important; }

.invisible {
  visibility: hidden; }

.text-hide {
  font: 0/0 a;
  color: transparent;
  text-shadow: none;
  background-color: transparent;
  border: 0; }

.hidden {
  display: none !important; }

.affix {
  position: fixed; }

@-ms-viewport {
  width: device-width; }
.visible-xs {
  display: none !important; }

.visible-sm {
  display: none !important; }

.visible-md {
  display: none !important; }

.visible-lg {
  display: none !important; }

.visible-xs-block,
.visible-xs-inline,
.visible-xs-inline-block,
.visible-sm-block,
.visible-sm-inline,
.visible-sm-inline-block,
.visible-md-block,
.visible-md-inline,
.visible-md-inline-block,
.visible-lg-block,
.visible-lg-inline,
.visible-lg-inline-block {
  display: none !important; }

@media (max-width: 739px) {
  .visible-xs {
    display: block !important; }

  table.visible-xs {
    display: table !important; }

  tr.visible-xs {
    display: table-row !important; }

  th.visible-xs,
  td.visible-xs {
    display: table-cell !important; } }
@media (max-width: 739px) {
  .visible-xs-block {
    display: block !important; } }

@media (max-width: 739px) {
  .visible-xs-inline {
    display: inline !important; } }

@media (max-width: 739px) {
  .visible-xs-inline-block {
    display: inline-block !important; } }

@media (min-width: 740px) and (max-width: 991px) {
  .visible-sm {
    display: block !important; }

  table.visible-sm {
    display: table !important; }

  tr.visible-sm {
    display: table-row !important; }

  th.visible-sm,
  td.visible-sm {
    display: table-cell !important; } }
@media (min-width: 740px) and (max-width: 991px) {
  .visible-sm-block {
    display: block !important; } }

@media (min-width: 740px) and (max-width: 991px) {
  .visible-sm-inline {
    display: inline !important; } }

@media (min-width: 740px) and (max-width: 991px) {
  .visible-sm-inline-block {
    display: inline-block !important; } }

@media (min-width: 992px) and (max-width: 1366px) {
	.p-category > div span {
    float: left;
    width: 100%;
    font-family: 'Nunito', sans-serif;
    font-size: 15px !important;
    color: #202020;
    margin-top: 3px;
    min-height: 65px !important;}
	.boxpack1 {
    min-height: 275px !important;
}
  .visible-md {
    display: block !important; }

  table.visible-md {
    display: table !important; }

  tr.visible-md {
    display: table-row !important; }

  th.visible-md,
  td.visible-md {
    display: table-cell !important; } }
@media (min-width: 992px) and (max-width: 1366px) {
  .visible-md-block {
    display: block !important; } }

@media (min-width: 992px) and (max-width: 1366px) {
  .visible-md-inline {
    display: inline !important; } }

@media (min-width: 992px) and (max-width: 1366px) {
  .visible-md-inline-block {
    display: inline-block !important; } }

@media (min-width: 1367px) {
  .visible-lg {
    display: block !important; }

  table.visible-lg {
    display: table !important; }

  tr.visible-lg {
    display: table-row !important; }

  th.visible-lg,
  td.visible-lg {
    display: table-cell !important; } }
@media (min-width: 1367px) {
  .visible-lg-block {
    display: block !important; } }

@media (min-width: 1367px) {
  .visible-lg-inline {
    display: inline !important; } }

@media (min-width: 1367px) {
  .visible-lg-inline-block {
    display: inline-block !important; } }

@media (max-width: 739px) {
  .hidden-xs {
    display: none !important; } }
@media (min-width: 740px) and (max-width: 991px) {
  .hidden-sm {
    display: none !important; } }
@media (min-width: 992px) and (max-width: 1366px) {
  .hidden-md {
    display: none !important; } }
@media (min-width: 1367px) {
  .hidden-lg {
    display: none !important; } }
.visible-print {
  display: none !important; }

@media print {
  .visible-print {
    display: block !important; }

  table.visible-print {
    display: table !important; }

  tr.visible-print {
    display: table-row !important; }

  th.visible-print,
  td.visible-print {
    display: table-cell !important; } }
.visible-print-block {
  display: none !important; }
  @media print {
    .visible-print-block {
      display: block !important; } }

.visible-print-inline {
  display: none !important; }
  @media print {
    .visible-print-inline {
      display: inline !important; } }

.visible-print-inline-block {
  display: none !important; }
  @media print {
    .visible-print-inline-block {
      display: inline-block !important; } }

@media print {
  .hidden-print {
    display: none !important; } }
/*
* Font Awesome 4.7.0
* Homepage: http://fontawesome.io
* Author: @davegandy
* License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
*/
/* 2 :: FONTAWESOME */
@font-face {
  font-family: 'FontAwesome';
  src: url("<?php echo  get_template_directory_uri();?>/icons/fontawesome-webfont-v=4.7.0.eot");
  src: url("<?php echo  get_template_directory_uri();?>/icons/fontawesome-webfont-.eot#iefix&v=4.7.0") format("embedded-opentype"), url("<?php echo  get_template_directory_uri();?>/icons/fontawesome-webfont-v=4.7.0.woff2") format("woff2"), url("<?php echo  get_template_directory_uri();?>/icons/fontawesome-webfont-v=4.7.0.woff") format("woff"), url("<?php echo  get_template_directory_uri();?>/icons/fontawesome-webfont-v=4.7.0.ttf") format("truetype"), url("<?php echo  get_template_directory_uri();?>/icons/fontawesome-webfont-v=4.7.0.svg#fontawesomeregular") format("svg");
  font-weight: normal;
  font-style: normal; }
.fa {
  display: inline-block;
  font: normal normal normal 14px/1 FontAwesome;
  font-size: 2rem;
  text-rendering: auto;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; }

.fa-glass:before {
  content: ""; }

.fa-music:before {
  content: ""; }

.fa-search:before {
  content: ""; }

.fa-envelope-o:before {
  content: ""; }

.fa-heart:before {
  content: ""; }

.fa-star:before {
  content: ""; }

.fa-star-o:before {
  content: ""; }

.fa-user:before {
  content: ""; }

.fa-film:before {
  content: ""; }

.fa-th-large:before {
  content: ""; }

.fa-th:before {
  content: ""; }

.fa-th-list:before {
  content: ""; }

.fa-check:before {
  content: ""; }

.fa-remove:before,
.fa-close:before,
.fa-times:before {
  content: ""; }

.fa-search-plus:before {
  content: ""; }

.fa-search-minus:before {
  content: ""; }

.fa-power-off:before {
  content: ""; }

.fa-signal:before {
  content: ""; }

.fa-gear:before,
.fa-cog:before {
  content: ""; }

.fa-trash-o:before {
  content: ""; }

.fa-home:before {
  content: ""; }

.fa-file-o:before {
  content: ""; }

.fa-clock-o:before {
  content: ""; }

.fa-road:before {
  content: ""; }

.fa-download:before {
  content: ""; }

.fa-arrow-circle-o-down:before {
  content: ""; }

.fa-arrow-circle-o-up:before {
  content: ""; }

.fa-inbox:before {
  content: ""; }

.fa-play-circle-o:before {
  content: ""; }

.fa-rotate-right:before,
.fa-repeat:before {
  content: ""; }

.fa-refresh:before {
  content: ""; }

.fa-list-alt:before {
  content: ""; }

.fa-lock:before {
  content: ""; }

.fa-flag:before {
  content: ""; }

.fa-headphones:before {
  content: ""; }

.fa-volume-off:before {
  content: ""; }

.fa-volume-down:before {
  content: ""; }

.fa-volume-up:before {
  content: ""; }

.fa-qrcode:before {
  content: ""; }

.fa-barcode:before {
  content: ""; }

.fa-tag:before {
  content: ""; }

.fa-tags:before {
  content: ""; }

.fa-book:before {
  content: ""; }

.fa-bookmark:before {
  content: ""; }

.fa-print:before {
  content: ""; }

.fa-camera:before {
  content: ""; }

.fa-font:before {
  content: ""; }

.fa-bold:before {
  content: ""; }

.fa-italic:before {
  content: ""; }

.fa-text-height:before {
  content: ""; }

.fa-text-width:before {
  content: ""; }

.fa-align-left:before {
  content: ""; }

.fa-align-center:before {
  content: ""; }

.fa-align-right:before {
  content: ""; }

.fa-align-justify:before {
  content: ""; }

.fa-list:before {
  content: ""; }

.fa-dedent:before,
.fa-outdent:before {
  content: ""; }

.fa-indent:before {
  content: ""; }

.fa-video-camera:before {
  content: ""; }

.fa-photo:before,
.fa-image:before,
.fa-picture-o:before {
  content: ""; }

.fa-pencil:before {
  content: ""; }

.fa-map-marker:before {
  content: ""; }

.fa-adjust:before {
  content: ""; }

.fa-tint:before {
  content: ""; }

.fa-edit:before,
.fa-pencil-square-o:before {
  content: ""; }

.fa-share-square-o:before {
  content: ""; }

.fa-check-square-o:before {
  content: ""; }

.fa-arrows:before {
  content: ""; }

.fa-step-backward:before {
  content: ""; }

.fa-fast-backward:before {
  content: ""; }

.fa-backward:before {
  content: ""; }

.fa-play:before {
  content: ""; }

.fa-pause:before {
  content: ""; }

.fa-stop:before {
  content: ""; }

.fa-forward:before {
  content: ""; }

.fa-fast-forward:before {
  content: ""; }

.fa-step-forward:before {
  content: ""; }

.fa-eject:before {
  content: ""; }

.fa-chevron-left:before {
  content: ""; }

.fa-chevron-right:before {
  content: ""; }

.fa-plus-circle:before {
  content: ""; }

.fa-minus-circle:before {
  content: ""; }

.fa-times-circle:before {
  content: ""; }

.fa-check-circle:before {
  content: ""; }

.fa-question-circle:before {
  content: ""; }

.fa-info-circle:before {
  content: ""; }

.fa-crosshairs:before {
  content: ""; }

.fa-times-circle-o:before {
  content: ""; }

.fa-check-circle-o:before {
  content: ""; }

.fa-ban:before {
  content: ""; }

.fa-arrow-left:before {
  content: ""; }

.fa-arrow-right:before {
  content: ""; }

.fa-arrow-up:before {
  content: ""; }

.fa-arrow-down:before {
  content: ""; }

.fa-mail-forward:before,
.fa-share:before {
  content: ""; }

.fa-expand:before {
  content: ""; }

.fa-compress:before {
  content: ""; }

.fa-plus:before {
  content: ""; }

.fa-minus:before {
  content: ""; }

.fa-asterisk:before {
  content: ""; }

.fa-exclamation-circle:before {
  content: ""; }

.fa-gift:before {
  content: ""; }

.fa-leaf:before {
  content: ""; }

.fa-fire:before {
  content: ""; }

.fa-eye:before {
  content: ""; }

.fa-eye-slash:before {
  content: ""; }

.fa-warning:before,
.fa-exclamation-triangle:before {
  content: ""; }

.fa-plane:before {
  content: ""; }

.fa-calendar:before {
  content: ""; }

.fa-random:before {
  content: ""; }

.fa-comment:before {
  content: ""; }

.fa-magnet:before {
  content: ""; }

.fa-chevron-up:before {
  content: ""; }

.fa-chevron-down:before {
  content: ""; }

.fa-retweet:before {
  content: ""; }

.fa-shopping-cart:before {
  content: ""; }

.fa-folder:before {
  content: ""; }

.fa-folder-open:before {
  content: ""; }

.fa-arrows-v:before {
  content: ""; }

.fa-arrows-h:before {
  content: ""; }

.fa-bar-chart-o:before,
.fa-bar-chart:before {
  content: ""; }

.fa-twitter-square:before {
  content: ""; }

.fa-facebook-square:before {
  content: ""; }

.fa-camera-retro:before {
  content: ""; }

.fa-key:before {
  content: ""; }

.fa-gears:before,
.fa-cogs:before {
  content: ""; }

.fa-comments:before {
  content: ""; }

.fa-thumbs-o-up:before {
  content: ""; }

.fa-thumbs-o-down:before {
  content: ""; }

.fa-star-half:before {
  content: ""; }

.fa-heart-o:before {
  content: ""; }

.fa-sign-out:before {
  content: ""; }

.fa-linkedin-square:before {
  content: ""; }

.fa-thumb-tack:before {
  content: ""; }

.fa-external-link:before {
  content: ""; }

.fa-sign-in:before {
  content: ""; }

.fa-trophy:before {
  content: ""; }

.fa-github-square:before {
  content: ""; }

.fa-upload:before {
  content: ""; }

.fa-lemon-o:before {
  content: ""; }

.fa-phone:before {
  content: ""; }

.fa-square-o:before {
  content: ""; }

.fa-bookmark-o:before {
  content: ""; }

.fa-phone-square:before {
  content: ""; }

.fa-twitter:before {
  content: ""; }

.fa-facebook-f:before,
.fa-facebook:before {
  content: ""; }

.fa-github:before {
  content: ""; }

.fa-unlock:before {
  content: ""; }

.fa-credit-card:before {
  content: ""; }

.fa-feed:before,
.fa-rss:before {
  content: ""; }

.fa-hdd-o:before {
  content: ""; }

.fa-bullhorn:before {
  content: ""; }

.fa-bell:before {
  content: ""; }

.fa-certificate:before {
  content: ""; }

.fa-hand-o-right:before {
  content: ""; }

.fa-hand-o-left:before {
  content: ""; }

.fa-hand-o-up:before {
  content: ""; }

.fa-hand-o-down:before {
  content: ""; }

.fa-arrow-circle-left:before {
  content: ""; }

.fa-arrow-circle-right:before {
  content: ""; }

.fa-arrow-circle-up:before {
  content: ""; }

.fa-arrow-circle-down:before {
  content: ""; }

.fa-globe:before {
  content: ""; }

.fa-wrench:before {
  content: ""; }

.fa-tasks:before {
  content: ""; }

.fa-filter:before {
  content: ""; }

.fa-briefcase:before {
  content: ""; }

.fa-arrows-alt:before {
  content: ""; }

.fa-group:before,
.fa-users:before {
  content: ""; }

.fa-chain:before,
.fa-link:before {
  content: ""; }

.fa-cloud:before {
  content: ""; }

.fa-flask:before {
  content: ""; }

.fa-cut:before,
.fa-scissors:before {
  content: ""; }

.fa-copy:before,
.fa-files-o:before {
  content: ""; }

.fa-paperclip:before {
  content: ""; }

.fa-save:before,
.fa-floppy-o:before {
  content: ""; }

.fa-square:before {
  content: ""; }

.fa-navicon:before,
.fa-reorder:before,
.fa-bars:before {
  content: ""; }

.fa-list-ul:before {
  content: ""; }

.fa-list-ol:before {
  content: ""; }

.fa-strikethrough:before {
  content: ""; }

.fa-underline:before {
  content: ""; }

.fa-table:before {
  content: ""; }

.fa-magic:before {
  content: ""; }

.fa-truck:before {
  content: ""; }

.fa-pinterest:before {
  content: ""; }

.fa-pinterest-square:before {
  content: ""; }

.fa-google-plus-square:before {
  content: ""; }

.fa-google-plus:before {
  content: ""; }

.fa-money:before {
  content: ""; }

.fa-caret-down:before {
  content: ""; }

.fa-caret-up:before {
  content: ""; }

.fa-caret-left:before {
  content: ""; }

.fa-caret-right:before {
  content: ""; }

.fa-columns:before {
  content: ""; }

.fa-unsorted:before,
.fa-sort:before {
  content: ""; }

.fa-sort-down:before,
.fa-sort-desc:before {
  content: ""; }

.fa-sort-up:before,
.fa-sort-asc:before {
  content: ""; }

.fa-envelope:before {
  content: ""; }

.fa-linkedin:before {
  content: ""; }

.fa-rotate-left:before,
.fa-undo:before {
  content: ""; }

.fa-legal:before,
.fa-gavel:before {
  content: ""; }

.fa-dashboard:before,
.fa-tachometer:before {
  content: ""; }

.fa-comment-o:before {
  content: ""; }

.fa-comments-o:before {
  content: ""; }

.fa-flash:before,
.fa-bolt:before {
  content: ""; }

.fa-sitemap:before {
  content: ""; }

.fa-umbrella:before {
  content: ""; }

.fa-paste:before,
.fa-clipboard:before {
  content: ""; }

.fa-lightbulb-o:before {
  content: ""; }

.fa-exchange:before {
  content: ""; }

.fa-cloud-download:before {
  content: ""; }

.fa-cloud-upload:before {
  content: ""; }

.fa-user-md:before {
  content: ""; }

.fa-stethoscope:before {
  content: ""; }

.fa-suitcase:before {
  content: ""; }

.fa-bell-o:before {
  content: ""; }

.fa-coffee:before {
  content: ""; }

.fa-cutlery:before {
  content: ""; }

.fa-file-text-o:before {
  content: ""; }

.fa-building-o:before {
  content: ""; }

.fa-hospital-o:before {
  content: ""; }

.fa-ambulance:before {
  content: ""; }

.fa-medkit:before {
  content: ""; }

.fa-fighter-jet:before {
  content: ""; }

.fa-beer:before {
  content: ""; }

.fa-h-square:before {
  content: ""; }

.fa-plus-square:before {
  content: ""; }

.fa-angle-double-left:before {
  content: ""; }

.fa-angle-double-right:before {
  content: ""; }

.fa-angle-double-up:before {
  content: ""; }

.fa-angle-double-down:before {
  content: ""; }

.fa-angle-left:before {
  content: ""; }

.fa-angle-right:before {
  content: ""; }

.fa-angle-up:before {
  content: ""; }

.fa-angle-down:before {
  content: ""; }

.fa-desktop:before {
  content: ""; }

.fa-laptop:before {
  content: ""; }

.fa-tablet:before {
  content: ""; }

.fa-mobile-phone:before,
.fa-mobile:before {
  content: ""; }

.fa-circle-o:before {
  content: ""; }

.fa-quote-left:before {
  content: ""; }

.fa-quote-right:before {
  content: ""; }

.fa-spinner:before {
  content: ""; }

.fa-circle:before {
  content: ""; }

.fa-mail-reply:before,
.fa-reply:before {
  content: ""; }

.fa-github-alt:before {
  content: ""; }

.fa-folder-o:before {
  content: ""; }

.fa-folder-open-o:before {
  content: ""; }

.fa-smile-o:before {
  content: ""; }

.fa-frown-o:before {
  content: ""; }

.fa-meh-o:before {
  content: ""; }

.fa-gamepad:before {
  content: ""; }

.fa-keyboard-o:before {
  content: ""; }

.fa-flag-o:before {
  content: ""; }

.fa-flag-checkered:before {
  content: ""; }

.fa-terminal:before {
  content: ""; }

.fa-code:before {
  content: ""; }

.fa-mail-reply-all:before,
.fa-reply-all:before {
  content: ""; }

.fa-star-half-empty:before,
.fa-star-half-full:before,
.fa-star-half-o:before {
  content: ""; }

.fa-location-arrow:before {
  content: ""; }

.fa-crop:before {
  content: ""; }

.fa-code-fork:before {
  content: ""; }

.fa-unlink:before,
.fa-chain-broken:before {
  content: ""; }

.fa-question:before {
  content: ""; }

.fa-info:before {
  content: ""; }

.fa-exclamation:before {
  content: ""; }

.fa-superscript:before {
  content: ""; }

.fa-subscript:before {
  content: ""; }

.fa-eraser:before {
  content: ""; }

.fa-puzzle-piece:before {
  content: ""; }

.fa-microphone:before {
  content: ""; }

.fa-microphone-slash:before {
  content: ""; }

.fa-shield:before {
  content: ""; }

.fa-calendar-o:before {
  content: ""; }

.fa-fire-extinguisher:before {
  content: ""; }

.fa-rocket:before {
  content: ""; }

.fa-maxcdn:before {
  content: ""; }

.fa-chevron-circle-left:before {
  content: ""; }

.fa-chevron-circle-right:before {
  content: ""; }

.fa-chevron-circle-up:before {
  content: ""; }

.fa-chevron-circle-down:before {
  content: ""; }

.fa-html5:before {
  content: ""; }

.fa-css3:before {
  content: ""; }

.fa-anchor:before {
  content: ""; }

.fa-unlock-alt:before {
  content: ""; }

.fa-bullseye:before {
  content: ""; }

.fa-ellipsis-h:before {
  content: ""; }

.fa-ellipsis-v:before {
  content: ""; }

.fa-rss-square:before {
  content: ""; }

.fa-play-circle:before {
  content: ""; }

.fa-ticket:before {
  content: ""; }

.fa-minus-square:before {
  content: ""; }

.fa-minus-square-o:before {
  content: ""; }

.fa-level-up:before {
  content: ""; }

.fa-level-down:before {
  content: ""; }

.fa-check-square:before {
  content: ""; }

.fa-pencil-square:before {
  content: ""; }

.fa-external-link-square:before {
  content: ""; }

.fa-share-square:before {
  content: ""; }

.fa-compass:before {
  content: ""; }

.fa-toggle-down:before,
.fa-caret-square-o-down:before {
  content: ""; }

.fa-toggle-up:before,
.fa-caret-square-o-up:before {
  content: ""; }

.fa-toggle-right:before,
.fa-caret-square-o-right:before {
  content: ""; }

.fa-euro:before,
.fa-eur:before {
  content: ""; }

.fa-gbp:before {
  content: ""; }

.fa-dollar:before,
.fa-usd:before {
  content: ""; }

.fa-rupee:before,
.fa-inr:before {
  content: ""; }

.fa-cny:before,
.fa-rmb:before,
.fa-yen:before,
.fa-jpy:before {
  content: ""; }

.fa-ruble:before,
.fa-rouble:before,
.fa-rub:before {
  content: ""; }

.fa-won:before,
.fa-krw:before {
  content: ""; }

.fa-bitcoin:before,
.fa-btc:before {
  content: ""; }

.fa-file:before {
  content: ""; }

.fa-file-text:before {
  content: ""; }

.fa-sort-alpha-asc:before {
  content: ""; }

.fa-sort-alpha-desc:before {
  content: ""; }

.fa-sort-amount-asc:before {
  content: ""; }

.fa-sort-amount-desc:before {
  content: ""; }

.fa-sort-numeric-asc:before {
  content: ""; }

.fa-sort-numeric-desc:before {
  content: ""; }

.fa-thumbs-up:before {
  content: ""; }

.fa-thumbs-down:before {
  content: ""; }

.fa-youtube-square:before {
  content: ""; }

.fa-youtube:before {
  content: ""; }

.fa-xing:before {
  content: ""; }

.fa-xing-square:before {
  content: ""; }

.fa-youtube-play:before {
  content: ""; }

.fa-dropbox:before {
  content: ""; }

.fa-stack-overflow:before {
  content: ""; }

.fa-instagram:before {
  content: ""; }

.fa-flickr:before {
  content: ""; }

.fa-adn:before {
  content: ""; }

.fa-bitbucket:before {
  content: ""; }

.fa-bitbucket-square:before {
  content: ""; }

.fa-tumblr:before {
  content: ""; }

.fa-tumblr-square:before {
  content: ""; }

.fa-long-arrow-down:before {
  content: ""; }

.fa-long-arrow-up:before {
  content: ""; }

.fa-long-arrow-left:before {
  content: ""; }

.fa-long-arrow-right:before {
  content: ""; }

.fa-apple:before {
  content: ""; }

.fa-windows:before {
  content: ""; }

.fa-android:before {
  content: ""; }

.fa-linux:before {
  content: ""; }

.fa-dribbble:before {
  content: ""; }

.fa-skype:before {
  content: ""; }

.fa-foursquare:before {
  content: ""; }

.fa-trello:before {
  content: ""; }

.fa-female:before {
  content: ""; }

.fa-male:before {
  content: ""; }

.fa-gittip:before,
.fa-gratipay:before {
  content: ""; }

.fa-sun-o:before {
  content: ""; }

.fa-moon-o:before {
  content: ""; }

.fa-archive:before {
  content: ""; }

.fa-bug:before {
  content: ""; }

.fa-vk:before {
  content: ""; }

.fa-weibo:before {
  content: ""; }

.fa-renren:before {
  content: ""; }

.fa-pagelines:before {
  content: ""; }

.fa-stack-exchange:before {
  content: ""; }

.fa-arrow-circle-o-right:before {
  content: ""; }

.fa-arrow-circle-o-left:before {
  content: ""; }

.fa-toggle-left:before,
.fa-caret-square-o-left:before {
  content: ""; }

.fa-dot-circle-o:before {
  content: ""; }

.fa-wheelchair:before {
  content: ""; }

.fa-vimeo-square:before {
  content: ""; }

.fa-turkish-lira:before,
.fa-try:before {
  content: ""; }

.fa-plus-square-o:before {
  content: ""; }

.fa-space-shuttle:before {
  content: ""; }

.fa-slack:before {
  content: ""; }

.fa-envelope-square:before {
  content: ""; }

.fa-wordpress:before {
  content: ""; }

.fa-openid:before {
  content: ""; }

.fa-institution:before,
.fa-bank:before,
.fa-university:before {
  content: ""; }

.fa-mortar-board:before,
.fa-graduation-cap:before {
  content: ""; }

.fa-yahoo:before {
  content: ""; }

.fa-google:before {
  content: ""; }

.fa-reddit:before {
  content: ""; }

.fa-reddit-square:before {
  content: ""; }

.fa-stumbleupon-circle:before {
  content: ""; }

.fa-stumbleupon:before {
  content: ""; }

.fa-delicious:before {
  content: ""; }

.fa-digg:before {
  content: ""; }

.fa-pied-piper-pp:before {
  content: ""; }

.fa-pied-piper-alt:before {
  content: ""; }

.fa-drupal:before {
  content: ""; }

.fa-joomla:before {
  content: ""; }

.fa-language:before {
  content: ""; }

.fa-fax:before {
  content: ""; }

.fa-building:before {
  content: ""; }

.fa-child:before {
  content: ""; }

.fa-paw:before {
  content: ""; }

.fa-spoon:before {
  content: ""; }

.fa-cube:before {
  content: ""; }

.fa-cubes:before {
  content: ""; }

.fa-behance:before {
  content: ""; }

.fa-behance-square:before {
  content: ""; }

.fa-steam:before {
  content: ""; }

.fa-steam-square:before {
  content: ""; }

.fa-recycle:before {
  content: ""; }

.fa-automobile:before,
.fa-car:before {
  content: ""; }

.fa-cab:before,
.fa-taxi:before {
  content: ""; }

.fa-tree:before {
  content: ""; }

.fa-spotify:before {
  content: ""; }

.fa-deviantart:before {
  content: ""; }

.fa-soundcloud:before {
  content: ""; }

.fa-database:before {
  content: ""; }

.fa-file-pdf-o:before {
  content: ""; }

.fa-file-word-o:before {
  content: ""; }

.fa-file-excel-o:before {
  content: ""; }

.fa-file-powerpoint-o:before {
  content: ""; }

.fa-file-photo-o:before,
.fa-file-picture-o:before,
.fa-file-image-o:before {
  content: ""; }

.fa-file-zip-o:before,
.fa-file-archive-o:before {
  content: ""; }

.fa-file-sound-o:before,
.fa-file-audio-o:before {
  content: ""; }

.fa-file-movie-o:before,
.fa-file-video-o:before {
  content: ""; }

.fa-file-code-o:before {
  content: ""; }

.fa-vine:before {
  content: ""; }

.fa-codepen:before {
  content: ""; }

.fa-jsfiddle:before {
  content: ""; }

.fa-life-bouy:before,
.fa-life-buoy:before,
.fa-life-saver:before,
.fa-support:before,
.fa-life-ring:before {
  content: ""; }

.fa-circle-o-notch:before {
  content: ""; }

.fa-ra:before,
.fa-resistance:before,
.fa-rebel:before {
  content: ""; }

.fa-ge:before,
.fa-empire:before {
  content: ""; }

.fa-git-square:before {
  content: ""; }

.fa-git:before {
  content: ""; }

.fa-y-combinator-square:before,
.fa-yc-square:before,
.fa-hacker-news:before {
  content: ""; }

.fa-tencent-weibo:before {
  content: ""; }

.fa-qq:before {
  content: ""; }

.fa-wechat:before,
.fa-weixin:before {
  content: ""; }

.fa-send:before,
.fa-paper-plane:before {
  content: ""; }

.fa-send-o:before,
.fa-paper-plane-o:before {
  content: ""; }

.fa-history:before {
  content: ""; }

.fa-circle-thin:before {
  content: ""; }

.fa-header:before {
  content: ""; }

.fa-paragraph:before {
  content: ""; }

.fa-sliders:before {
  content: ""; }

.fa-share-alt:before {
  content: ""; }

.fa-share-alt-square:before {
  content: ""; }

.fa-bomb:before {
  content: ""; }

.fa-soccer-ball-o:before,
.fa-futbol-o:before {
  content: ""; }

.fa-tty:before {
  content: ""; }

.fa-binoculars:before {
  content: ""; }

.fa-plug:before {
  content: ""; }

.fa-slideshare:before {
  content: ""; }

.fa-twitch:before {
  content: ""; }

.fa-yelp:before {
  content: ""; }

.fa-newspaper-o:before {
  content: ""; }

.fa-wifi:before {
  content: ""; }

.fa-calculator:before {
  content: ""; }

.fa-paypal:before {
  content: ""; }

.fa-google-wallet:before {
  content: ""; }

.fa-cc-visa:before {
  content: ""; }

.fa-cc-mastercard:before {
  content: ""; }

.fa-cc-discover:before {
  content: ""; }

.fa-cc-amex:before {
  content: ""; }

.fa-cc-paypal:before {
  content: ""; }

.fa-cc-stripe:before {
  content: ""; }

.fa-bell-slash:before {
  content: ""; }

.fa-bell-slash-o:before {
  content: ""; }

.fa-trash:before {
  content: ""; }

.fa-copyright:before {
  content: ""; }

.fa-at:before {
  content: ""; }

.fa-eyedropper:before {
  content: ""; }

.fa-paint-brush:before {
  content: ""; }

.fa-birthday-cake:before {
  content: ""; }

.fa-area-chart:before {
  content: ""; }

.fa-pie-chart:before {
  content: ""; }

.fa-line-chart:before {
  content: ""; }

.fa-lastfm:before {
  content: ""; }

.fa-lastfm-square:before {
  content: ""; }

.fa-toggle-off:before {
  content: ""; }

.fa-toggle-on:before {
  content: ""; }

.fa-bicycle:before {
  content: ""; }

.fa-bus:before {
  content: ""; }

.fa-ioxhost:before {
  content: ""; }

.fa-angellist:before {
  content: ""; }

.fa-cc:before {
  content: ""; }

.fa-shekel:before,
.fa-sheqel:before,
.fa-ils:before {
  content: ""; }

.fa-meanpath:before {
  content: ""; }

.fa-buysellads:before {
  content: ""; }

.fa-connectdevelop:before {
  content: ""; }

.fa-dashcube:before {
  content: ""; }

.fa-forumbee:before {
  content: ""; }

.fa-leanpub:before {
  content: ""; }

.fa-sellsy:before {
  content: ""; }

.fa-shirtsinbulk:before {
  content: ""; }

.fa-simplybuilt:before {
  content: ""; }

.fa-skyatlas:before {
  content: ""; }

.fa-cart-plus:before {
  content: ""; }

.fa-cart-arrow-down:before {
  content: ""; }

.fa-diamond:before {
  content: ""; }

.fa-ship:before {
  content: ""; }

.fa-user-secret:before {
  content: ""; }

.fa-motorcycle:before {
  content: ""; }

.fa-street-view:before {
  content: ""; }

.fa-heartbeat:before {
  content: ""; }

.fa-venus:before {
  content: ""; }

.fa-mars:before {
  content: ""; }

.fa-mercury:before {
  content: ""; }

.fa-intersex:before,
.fa-transgender:before {
  content: ""; }

.fa-transgender-alt:before {
  content: ""; }

.fa-venus-double:before {
  content: ""; }

.fa-mars-double:before {
  content: ""; }

.fa-venus-mars:before {
  content: ""; }

.fa-mars-stroke:before {
  content: ""; }

.fa-mars-stroke-v:before {
  content: ""; }

.fa-mars-stroke-h:before {
  content: ""; }

.fa-neuter:before {
  content: ""; }

.fa-genderless:before {
  content: ""; }

.fa-facebook-official:before {
  content: ""; }

.fa-pinterest-p:before {
  content: ""; }

.fa-whatsapp:before {
  content: ""; }

.fa-server:before {
  content: ""; }

.fa-user-plus:before {
  content: ""; }

.fa-user-times:before {
  content: ""; }

.fa-hotel:before,
.fa-bed:before {
  content: ""; }

.fa-viacoin:before {
  content: ""; }

.fa-train:before {
  content: ""; }

.fa-subway:before {
  content: ""; }

.fa-medium:before {
  content: ""; }

.fa-yc:before,
.fa-y-combinator:before {
  content: ""; }

.fa-optin-monster:before {
  content: ""; }

.fa-opencart:before {
  content: ""; }

.fa-expeditedssl:before {
  content: ""; }

.fa-battery-4:before,
.fa-battery:before,
.fa-battery-full:before {
  content: ""; }

.fa-battery-3:before,
.fa-battery-three-quarters:before {
  content: ""; }

.fa-battery-2:before,
.fa-battery-half:before {
  content: ""; }

.fa-battery-1:before,
.fa-battery-quarter:before {
  content: ""; }

.fa-battery-0:before,
.fa-battery-empty:before {
  content: ""; }

.fa-mouse-pointer:before {
  content: ""; }

.fa-i-cursor:before {
  content: ""; }

.fa-object-group:before {
  content: ""; }

.fa-object-ungroup:before {
  content: ""; }

.fa-sticky-note:before {
  content: ""; }

.fa-sticky-note-o:before {
  content: ""; }

.fa-cc-jcb:before {
  content: ""; }

.fa-cc-diners-club:before {
  content: ""; }

.fa-clone:before {
  content: ""; }

.fa-balance-scale:before {
  content: ""; }

.fa-hourglass-o:before {
  content: ""; }

.fa-hourglass-1:before,
.fa-hourglass-start:before {
  content: ""; }

.fa-hourglass-2:before,
.fa-hourglass-half:before {
  content: ""; }

.fa-hourglass-3:before,
.fa-hourglass-end:before {
  content: ""; }

.fa-hourglass:before {
  content: ""; }

.fa-hand-grab-o:before,
.fa-hand-rock-o:before {
  content: ""; }

.fa-hand-stop-o:before,
.fa-hand-paper-o:before {
  content: ""; }

.fa-hand-scissors-o:before {
  content: ""; }

.fa-hand-lizard-o:before {
  content: ""; }

.fa-hand-spock-o:before {
  content: ""; }

.fa-hand-pointer-o:before {
  content: ""; }

.fa-hand-peace-o:before {
  content: ""; }

.fa-trademark:before {
  content: ""; }

.fa-registered:before {
  content: ""; }

.fa-creative-commons:before {
  content: ""; }

.fa-gg:before {
  content: ""; }

.fa-gg-circle:before {
  content: ""; }

.fa-tripadvisor:before {
  content: ""; }

.fa-odnoklassniki:before {
  content: ""; }

.fa-odnoklassniki-square:before {
  content: ""; }

.fa-get-pocket:before {
  content: ""; }

.fa-wikipedia-w:before {
  content: ""; }

.fa-safari:before {
  content: ""; }

.fa-chrome:before {
  content: ""; }

.fa-firefox:before {
  content: ""; }

.fa-opera:before {
  content: ""; }

.fa-internet-explorer:before {
  content: ""; }

.fa-tv:before,
.fa-television:before {
  content: ""; }

.fa-contao:before {
  content: ""; }

.fa-500px:before {
  content: ""; }

.fa-amazon:before {
  content: ""; }

.fa-calendar-plus-o:before {
  content: ""; }

.fa-calendar-minus-o:before {
  content: ""; }

.fa-calendar-times-o:before {
  content: ""; }

.fa-calendar-check-o:before {
  content: ""; }

.fa-industry:before {
  content: ""; }

.fa-map-pin:before {
  content: ""; }

.fa-map-signs:before {
  content: ""; }

.fa-map-o:before {
  content: ""; }

.fa-map:before {
  content: ""; }

.fa-commenting:before {
  content: ""; }

.fa-commenting-o:before {
  content: ""; }

.fa-houzz:before {
  content: ""; }

.fa-vimeo:before {
  content: ""; }

.fa-black-tie:before {
  content: ""; }

.fa-fonticons:before {
  content: ""; }

.fa-reddit-alien:before {
  content: ""; }

.fa-edge:before {
  content: ""; }

.fa-credit-card-alt:before {
  content: ""; }

.fa-codiepie:before {
  content: ""; }

.fa-modx:before {
  content: ""; }

.fa-fort-awesome:before {
  content: ""; }

.fa-usb:before {
  content: ""; }

.fa-product-hunt:before {
  content: ""; }

.fa-mixcloud:before {
  content: ""; }

.fa-scribd:before {
  content: ""; }

.fa-pause-circle:before {
  content: ""; }

.fa-pause-circle-o:before {
  content: ""; }

.fa-stop-circle:before {
  content: ""; }

.fa-stop-circle-o:before {
  content: ""; }

.fa-shopping-bag:before {
  content: ""; }

.fa-shopping-basket:before {
  content: ""; }

.fa-hashtag:before {
  content: ""; }

.fa-bluetooth:before {
  content: ""; }

.fa-bluetooth-b:before {
  content: ""; }

.fa-percent:before {
  content: ""; }

.fa-gitlab:before {
  content: ""; }

.fa-wpbeginner:before {
  content: ""; }

.fa-wpforms:before {
  content: ""; }

.fa-envira:before {
  content: ""; }

.fa-universal-access:before {
  content: ""; }

.fa-wheelchair-alt:before {
  content: ""; }

.fa-question-circle-o:before {
  content: ""; }

.fa-blind:before {
  content: ""; }

.fa-audio-description:before {
  content: ""; }

.fa-volume-control-phone:before {
  content: ""; }

.fa-braille:before {
  content: ""; }

.fa-assistive-listening-systems:before {
  content: ""; }

.fa-asl-interpreting:before,
.fa-american-sign-language-interpreting:before {
  content: ""; }

.fa-deafness:before,
.fa-hard-of-hearing:before,
.fa-deaf:before {
  content: ""; }

.fa-glide:before {
  content: ""; }

.fa-glide-g:before {
  content: ""; }

.fa-signing:before,
.fa-sign-language:before {
  content: ""; }

.fa-low-vision:before {
  content: ""; }

.fa-viadeo:before {
  content: ""; }

.fa-viadeo-square:before {
  content: ""; }

.fa-snapchat:before {
  content: ""; }

.fa-snapchat-ghost:before {
  content: ""; }

.fa-snapchat-square:before {
  content: ""; }

.fa-pied-piper:before {
  content: ""; }

.fa-first-order:before {
  content: ""; }

.fa-yoast:before {
  content: ""; }

.fa-themeisle:before {
  content: ""; }

.fa-google-plus-circle:before,
.fa-google-plus-official:before {
  content: ""; }

.fa-fa:before,
.fa-font-awesome:before {
  content: ""; }

.fa-handshake-o:before {
  content: ""; }

.fa-envelope-open:before {
  content: ""; }

.fa-envelope-open-o:before {
  content: ""; }

.fa-linode:before {
  content: ""; }

.fa-address-book:before {
  content: ""; }

.fa-address-book-o:before {
  content: ""; }

.fa-vcard:before,
.fa-address-card:before {
  content: ""; }

.fa-vcard-o:before,
.fa-address-card-o:before {
  content: ""; }

.fa-user-circle:before {
  content: ""; }

.fa-user-circle-o:before {
  content: ""; }

.fa-user-o:before {
  content: ""; }

.fa-id-badge:before {
  content: ""; }

.fa-drivers-license:before,
.fa-id-card:before {
  content: ""; }

.fa-drivers-license-o:before,
.fa-id-card-o:before {
  content: ""; }

.fa-quora:before {
  content: ""; }

.fa-free-code-camp:before {
  content: ""; }

.fa-telegram:before {
  content: ""; }

.fa-thermometer-4:before,
.fa-thermometer:before,
.fa-thermometer-full:before {
  content: ""; }

.fa-thermometer-3:before,
.fa-thermometer-three-quarters:before {
  content: ""; }

.fa-thermometer-2:before,
.fa-thermometer-half:before {
  content: ""; }

.fa-thermometer-1:before,
.fa-thermometer-quarter:before {
  content: ""; }

.fa-thermometer-0:before,
.fa-thermometer-empty:before {
  content: ""; }

.fa-shower:before {
  content: ""; }

.fa-bathtub:before,
.fa-s15:before,
.fa-bath:before {
  content: ""; }

.fa-podcast:before {
  content: ""; }

.fa-window-maximize:before {
  content: ""; }

.fa-window-minimize:before {
  content: ""; }

.fa-window-restore:before {
  content: ""; }

.fa-times-rectangle:before,
.fa-window-close:before {
  content: ""; }

.fa-times-rectangle-o:before,
.fa-window-close-o:before {
  content: ""; }

.fa-bandcamp:before {
  content: ""; }

.fa-grav:before {
  content: ""; }

.fa-etsy:before {
  content: ""; }

.fa-imdb:before {
  content: ""; }

.fa-ravelry:before {
  content: ""; }

.fa-eercast:before {
  content: ""; }

.fa-microchip:before {
  content: ""; }

.fa-snowflake-o:before {
  content: ""; }

.fa-superpowers:before {
  content: ""; }

.fa-wpexplorer:before {
  content: ""; }

.fa-meetup:before {
  content: ""; }

/*
* Owl Carousel v2
* Homepage: http://owlcarousel2.github.io/
* Author: David Deutsch
* Author URL: https://github.com/daviddeutsch
* License - MIT License
*/
/* 3 :: OWL CAROUSEL */
.owl-carousel {
  display: none;
  width: 100%;
  -webkit-tap-highlight-color: transparent;
  position: relative;
  z-index: 1; }
  .owl-carousel .owl-stage {
    position: relative;
    -ms-touch-action: pan-Y;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden; }
  .owl-carousel .owl-stage:after {
    content: ".";
    display: block;
    clear: both;
    visibility: hidden;
    line-height: 0;
    height: 0; }
  .owl-carousel .owl-stage-outer {
    position: relative;
    overflow: hidden;
    -webkit-transform: translate3d(0px, 0px, 0px);
    transform: translate3d(0px, 0px, 0px); }
  .owl-carousel .owl-wrapper,
  .owl-carousel .owl-item {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0); }
  .owl-carousel .owl-item {
    position: relative;
    min-height: 1px;
    float: left;
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-tap-highlight-color: transparent;
    -webkit-touch-callout: none; }
  .owl-carousel .owl-item img {
    display: block;
    width: 100%; }
  .owl-carousel .owl-nav.disabled,
  .owl-carousel .owl-dots.disabled {
    display: none; }
  .owl-carousel .owl-nav .owl-prev,
  .owl-carousel .owl-nav .owl-next,
  .owl-carousel .owl-dot {
    cursor: pointer;
    cursor: hand;
    -webkit-user-select: none;
    -khtml-user-select: none;
    user-select: none; }
  .owl-carousel.owl-loaded {
    display: block; }
  .owl-carousel.owl-loading {
    opacity: 0;
    display: block; }
  .owl-carousel.owl-hidden {
    opacity: 0; }
  .owl-carousel.owl-refresh .owl-item {
    visibility: hidden; }
  .owl-carousel.owl-drag .owl-item {
    -webkit-user-select: none;
    -khtml-user-select: none;
    user-select: none; }
  .owl-carousel.owl-drag {
    cursor: url("<?php echo  get_template_directory_uri();?>/images/cursors/openhand.cur"), move; }
  .owl-carousel.owl-grab, .owl-carousel:focus {
    cursor: url("<?php echo  get_template_directory_uri();?>/images/cursors/closedhand.cur"), move; }
  .owl-carousel.owl-rtl {
    direction: rtl; }
  .owl-carousel.owl-rtl .owl-item {
    float: right; }

.no-js .owl-carousel {
  display: block; }

/* 3.2 :: Owl Carousel Animate */
.owl-carousel .animated {
  animation-duration: 1000ms;
  animation-fill-mode: both; }
.owl-carousel .owl-animated-in {
  z-index: 0; }
.owl-carousel .owl-animated-out {
  z-index: 1; }
.owl-carousel .fadeOut {
  animation-name: fadeOut; }

@keyframes fadeOut {
  0% {
    opacity: 1; }
  100% {
    opacity: 0; } }
/* 3.3 :: Owl Carousel Autoheight */
.owl-height {
  transition: height 500ms ease-in-out; }

/* 3.4 :: Owl Carousel Theme */
.owl-theme .owl-nav {
  margin-top: 10px;
  text-align: center;
  -webkit-tap-highlight-color: transparent;
  display: none; }
  .owl-theme .owl-nav [class*='owl-'] {
    color: #8e9bae; }
    .owl-theme .owl-nav [class*='owl-']:hover {
      color: #8089ff; }
  .owl-theme .owl-nav .disabled {
    opacity: 0.5;
    cursor: default; }
  .owl-theme .owl-nav .owl-prev, .owl-theme .owl-nav .owl-next {
    position: absolute;
    top: 6rem;
    font-size: 0; }
    .owl-theme .owl-nav .owl-prev::after, .owl-theme .owl-nav .owl-next::after {
      display: inline-block;
      font: normal normal normal 14px/1 FontAwesome;
      font-size: 2rem;
      text-rendering: auto;
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale; }
  .owl-theme .owl-nav .owl-prev {
    left: -2rem; }
    .owl-theme .owl-nav .owl-prev::after {
      content: '\f104'; }
  .owl-theme .owl-nav .owl-next {
    right: -2rem; }
    .owl-theme .owl-nav .owl-next::after {
      content: '\f105'; }
  @media (min-width: 740px) {
    .owl-theme .owl-nav {
      display: block; } }
  @media (min-width: 1250px) {
    .owl-theme .owl-nav .owl-prev {
      left: -3rem; }
    .owl-theme .owl-nav .owl-next {
      right: -3rem; } }
.owl-theme .owl-nav.disabled + .owl-dots {
  margin-top: 10px; }
.owl-theme .owl-dots {
  text-align: center;
  -webkit-tap-highlight-color: transparent; }
  .owl-theme .owl-dots .owl-dot {
    display: inline-block;
    zoom: 1; }
    .owl-theme .owl-dots .owl-dot span {
      width: 8px;
      height: 8px;
      margin: 0.25rem 0.25rem;
      background: #8e9bae;
      display: block;
      -webkit-backface-visibility: visible;
      transition: opacity 200ms ease;
      border-radius: 30px; }
    .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
      background: #8089ff; }

/*
* Simple Line Icons
* Homepage: http://simplelineicons.com
* Author: Sabbir Ahmed
* Author URL: https://github.com/thesabbir
* License - MIT License
*/
/* 4 :: SIMPLE LINE ICONS */
@font-face {
  font-family: "simple-line-icons";
  src: url("<?php echo  get_template_directory_uri();?>/icons/Simple-Line-Icons-v=2.4.0.eot");
  src: url("<?php echo  get_template_directory_uri();?>/icons/Simple-Line-Icons-v=2.4.0.eot#iefix") format("embedded-opentype"), url("<?php echo  get_template_directory_uri();?>/icons/Simple-Line-Icons-v=2.4.0.woff2") format("woff2"), url("<?php echo  get_template_directory_uri();?>/icons/Simple-Line-Icons-v=2.4.0.ttf") format("truetype"), url("<?php echo  get_template_directory_uri();?>/icons/Simple-Line-Icons-v=2.4.0.woff") format("woff"), url("<?php echo  get_template_directory_uri();?>/icons/Simple-Line-Icons-v=2.4.0.svg#simple-line-icons") format("svg");
  font-weight: normal;
  font-style: normal; }
.icon-user, .icon-people, .icon-user-female, .icon-user-follow, .icon-user-following, .icon-user-unfollow, .icon-login, .icon-logout, .icon-emotsmile, .icon-phone, .icon-call-end, .icon-call-in, .icon-call-out, .icon-map, .icon-location-pin, .icon-direction, .icon-directions, .icon-compass, .icon-layers, .icon-menu, .icon-list, .icon-options-vertical, .icon-options, .icon-arrow-down, .icon-arrow-left, .icon-arrow-right, .icon-arrow-up, .icon-arrow-up-circle, .icon-arrow-left-circle, .icon-arrow-right-circle, .icon-arrow-down-circle, .icon-check, .icon-clock, .icon-plus, .icon-minus, .icon-close, .icon-event, .icon-exclamation, .icon-organization, .icon-trophy, .icon-screen-smartphone, .icon-screen-desktop, .icon-plane, .icon-notebook, .icon-mustache, .icon-mouse, .icon-magnet, .icon-energy, .icon-disc, .icon-cursor, .icon-cursor-move, .icon-crop, .icon-chemistry, .icon-speedometer, .icon-shield, .icon-screen-tablet, .icon-magic-wand, .icon-hourglass, .icon-graduation, .icon-ghost, .icon-game-controller, .icon-fire, .icon-eyeglass, .icon-envelope-open, .icon-envelope-letter, .icon-bell, .icon-badge, .icon-anchor, .icon-wallet, .icon-vector, .icon-speech, .icon-puzzle, .icon-printer, .icon-present, .icon-playlist, .icon-pin, .icon-picture, .icon-handbag, .icon-globe-alt, .icon-globe, .icon-folder-alt, .icon-folder, .icon-film, .icon-feed, .icon-drop, .icon-drawer, .icon-docs, .icon-doc, .icon-diamond, .icon-cup, .icon-calculator, .icon-bubbles, .icon-briefcase, .icon-book-open, .icon-basket-loaded, .icon-basket, .icon-bag, .icon-action-undo, .icon-action-redo, .icon-wrench, .icon-umbrella, .icon-trash, .icon-tag, .icon-support, .icon-frame, .icon-size-fullscreen, .icon-size-actual, .icon-shuffle, .icon-share-alt, .icon-share, .icon-rocket, .icon-question, .icon-pie-chart, .icon-pencil, .icon-note, .icon-loop, .icon-home, .icon-grid, .icon-graph, .icon-microphone, .icon-music-tone-alt, .icon-music-tone, .icon-earphones-alt, .icon-earphones, .icon-equalizer, .icon-like, .icon-dislike, .icon-control-start, .icon-control-rewind, .icon-control-play, .icon-control-pause, .icon-control-forward, .icon-control-end, .icon-volume-1, .icon-volume-2, .icon-volume-off, .icon-calendar, .icon-bulb, .icon-chart, .icon-ban, .icon-bubble, .icon-camrecorder, .icon-camera, .icon-cloud-download, .icon-cloud-upload, .icon-envelope, .icon-eye, .icon-flag, .icon-heart, .icon-info, .icon-key, .icon-link, .icon-lock, .icon-lock-open, .icon-magnifier, .icon-magnifier-add, .icon-magnifier-remove, .icon-paper-clip, .icon-paper-plane, .icon-power, .icon-refresh, .icon-reload, .icon-settings, .icon-star, .icon-symbol-female, .icon-symbol-male, .icon-target, .icon-credit-card, .icon-paypal, .icon-social-tumblr, .icon-social-twitter, .icon-social-facebook, .icon-social-instagram, .icon-social-linkedin, .icon-social-pinterest, .icon-social-github, .icon-social-google, .icon-social-reddit, .icon-social-skype, .icon-social-dribbble, .icon-social-behance, .icon-social-foursqare, .icon-social-soundcloud, .icon-social-spotify, .icon-social-stumbleupon, .icon-social-youtube, .icon-social-dropbox, .icon-social-vkontakte, .icon-social-steam {
  display: inline-block;
  font-family: "simple-line-icons";
  speak: none;
  font-style: normal;
  font-weight: normal;
  font-variant: normal;
  text-transform: none;
  line-height: 1;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale; }

.icon-user:before {
  content: "\e005"; }

.icon-people:before {
  content: "\e001"; }

.icon-user-female:before {
  content: "\e000"; }

.icon-user-follow:before {
  content: "\e002"; }

.icon-user-following:before {
  content: "\e003"; }

.icon-user-unfollow:before {
  content: "\e004"; }

.icon-login:before {
  content: "\e066"; }

.icon-logout:before {
  content: "\e065"; }

.icon-emotsmile:before {
  content: "\e021"; }

.icon-phone:before {
  content: "\e600"; }

.icon-call-end:before {
  content: "\e048"; }

.icon-call-in:before {
  content: "\e047"; }

.icon-call-out:before {
  content: "\e046"; }

.icon-map:before {
  content: "\e033"; }

.icon-location-pin:before {
  content: "\e096"; }

.icon-direction:before {
  content: "\e042"; }

.icon-directions:before {
  content: "\e041"; }

.icon-compass:before {
  content: "\e045"; }

.icon-layers:before {
  content: "\e034"; }

.icon-menu:before {
  content: "\e601"; }

.icon-list:before {
  content: "\e067"; }

.icon-options-vertical:before {
  content: "\e602"; }

.icon-options:before {
  content: "\e603"; }

.icon-arrow-down:before {
  content: "\e604"; }

.icon-arrow-left:before {
  content: "\e605"; }

.icon-arrow-right:before {
  content: "\e606"; }

.icon-arrow-up:before {
  content: "\e607"; }

.icon-arrow-up-circle:before {
  content: "\e078"; }

.icon-arrow-left-circle:before {
  content: "\e07a"; }

.icon-arrow-right-circle:before {
  content: "\e079"; }

.icon-arrow-down-circle:before {
  content: "\e07b"; }

.icon-check:before {
  content: "\e080"; }

.icon-clock:before {
  content: "\e081"; }

.icon-plus:before {
  content: "\e095"; }

.icon-minus:before {
  content: "\e615"; }

.icon-close:before {
  content: "\e082"; }

.icon-event:before {
  content: "\e619"; }

.icon-exclamation:before {
  content: "\e617"; }

.icon-organization:before {
  content: "\e616"; }

.icon-trophy:before {
  content: "\e006"; }

.icon-screen-smartphone:before {
  content: "\e010"; }

.icon-screen-desktop:before {
  content: "\e011"; }

.icon-plane:before {
  content: "\e012"; }

.icon-notebook:before {
  content: "\e013"; }

.icon-mustache:before {
  content: "\e014"; }

.icon-mouse:before {
  content: "\e015"; }

.icon-magnet:before {
  content: "\e016"; }

.icon-energy:before {
  content: "\e020"; }

.icon-disc:before {
  content: "\e022"; }

.icon-cursor:before {
  content: "\e06e"; }

.icon-cursor-move:before {
  content: "\e023"; }

.icon-crop:before {
  content: "\e024"; }

.icon-chemistry:before {
  content: "\e026"; }

.icon-speedometer:before {
  content: "\e007"; }

.icon-shield:before {
  content: "\e00e"; }

.icon-screen-tablet:before {
  content: "\e00f"; }

.icon-magic-wand:before {
  content: "\e017"; }

.icon-hourglass:before {
  content: "\e018"; }

.icon-graduation:before {
  content: "\e019"; }

.icon-ghost:before {
  content: "\e01a"; }

.icon-game-controller:before {
  content: "\e01b"; }

.icon-fire:before {
  content: "\e01c"; }

.icon-eyeglass:before {
  content: "\e01d"; }

.icon-envelope-open:before {
  content: "\e01e"; }

.icon-envelope-letter:before {
  content: "\e01f"; }

.icon-bell:before {
  content: "\e027"; }

.icon-badge:before {
  content: "\e028"; }

.icon-anchor:before {
  content: "\e029"; }

.icon-wallet:before {
  content: "\e02a"; }

.icon-vector:before {
  content: "\e02b"; }

.icon-speech:before {
  content: "\e02c"; }

.icon-puzzle:before {
  content: "\e02d"; }

.icon-printer:before {
  content: "\e02e"; }

.icon-present:before {
  content: "\e02f"; }

.icon-playlist:before {
  content: "\e030"; }

.icon-pin:before {
  content: "\e031"; }

.icon-picture:before {
  content: "\e032"; }

.icon-handbag:before {
  content: "\e035"; }

.icon-globe-alt:before {
  content: "\e036"; }

.icon-globe:before {
  content: "\e037"; }

.icon-folder-alt:before {
  content: "\e039"; }

.icon-folder:before {
  content: "\e089"; }

.icon-film:before {
  content: "\e03a"; }

.icon-feed:before {
  content: "\e03b"; }

.icon-drop:before {
  content: "\e03e"; }

.icon-drawer:before {
  content: "\e03f"; }

.icon-docs:before {
  content: "\e040"; }

.icon-doc:before {
  content: "\e085"; }

.icon-diamond:before {
  content: "\e043"; }

.icon-cup:before {
  content: "\e044"; }

.icon-calculator:before {
  content: "\e049"; }

.icon-bubbles:before {
  content: "\e04a"; }

.icon-briefcase:before {
  content: "\e04b"; }

.icon-book-open:before {
  content: "\e04c"; }

.icon-basket-loaded:before {
  content: "\e04d"; }

.icon-basket:before {
  content: "\e04e"; }

.icon-bag:before {
  content: "\e04f"; }

.icon-action-undo:before {
  content: "\e050"; }

.icon-action-redo:before {
  content: "\e051"; }

.icon-wrench:before {
  content: "\e052"; }

.icon-umbrella:before {
  content: "\e053"; }

.icon-trash:before {
  content: "\e054"; }

.icon-tag:before {
  content: "\e055"; }

.icon-support:before {
  content: "\e056"; }

.icon-frame:before {
  content: "\e038"; }

.icon-size-fullscreen:before {
  content: "\e057"; }

.icon-size-actual:before {
  content: "\e058"; }

.icon-shuffle:before {
  content: "\e059"; }

.icon-share-alt:before {
  content: "\e05a"; }

.icon-share:before {
  content: "\e05b"; }

.icon-rocket:before {
  content: "\e05c"; }

.icon-question:before {
  content: "\e05d"; }

.icon-pie-chart:before {
  content: "\e05e"; }

.icon-pencil:before {
  content: "\e05f"; }

.icon-note:before {
  content: "\e060"; }

.icon-loop:before {
  content: "\e064"; }

.icon-home:before {
  content: "\e069"; }

.icon-grid:before {
  content: "\e06a"; }

.icon-graph:before {
  content: "\e06b"; }

.icon-microphone:before {
  content: "\e063"; }

.icon-music-tone-alt:before {
  content: "\e061"; }

.icon-music-tone:before {
  content: "\e062"; }

.icon-earphones-alt:before {
  content: "\e03c"; }

.icon-earphones:before {
  content: "\e03d"; }

.icon-equalizer:before {
  content: "\e06c"; }

.icon-like:before {
  content: "\e068"; }

.icon-dislike:before {
  content: "\e06d"; }

.icon-control-start:before {
  content: "\e06f"; }

.icon-control-rewind:before {
  content: "\e070"; }

.icon-control-play:before {
  content: "\e071"; }

.icon-control-pause:before {
  content: "\e072"; }

.icon-control-forward:before {
  content: "\e073"; }

.icon-control-end:before {
  content: "\e074"; }

.icon-volume-1:before {
  content: "\e09f"; }

.icon-volume-2:before {
  content: "\e0a0"; }

.icon-volume-off:before {
  content: "\e0a1"; }

.icon-calendar:before {
  content: "\e075"; }

.icon-bulb:before {
  content: "\e076"; }

.icon-chart:before {
  content: "\e077"; }

.icon-ban:before {
  content: "\e07c"; }

.icon-bubble:before {
  content: "\e07d"; }

.icon-camrecorder:before {
  content: "\e07e"; }

.icon-camera:before {
  content: "\e07f"; }

.icon-cloud-download:before {
  content: "\e083"; }

.icon-cloud-upload:before {
  content: "\e084"; }

.icon-envelope:before {
  content: "\e086"; }

.icon-eye:before {
  content: "\e087"; }

.icon-flag:before {
  content: "\e088"; }

.icon-heart:before {
  content: "\e08a"; }

.icon-info:before {
  content: "\e08b"; }

.icon-key:before {
  content: "\e08c"; }

.icon-link:before {
  content: "\e08d"; }

.icon-lock:before {
  content: "\e08e"; }

.icon-lock-open:before {
  content: "\e08f"; }

.icon-magnifier:before {
  content: "\e090"; }

.icon-magnifier-add:before {
  content: "\e091"; }

.icon-magnifier-remove:before {
  content: "\e092"; }

.icon-paper-clip:before {
  content: "\e093"; }

.icon-paper-plane:before {
  content: "\e094"; }

.icon-power:before {
  content: "\e097"; }

.icon-refresh:before {
  content: "\e098"; }

.icon-reload:before {
  content: "\e099"; }

.icon-settings:before {
  content: "\e09a"; }

.icon-star:before {
  content: "\e09b"; }

.icon-symbol-female:before {
  content: "\e09c"; }

.icon-symbol-male:before {
  content: "\e09d"; }

.icon-target:before {
  content: "\e09e"; }

.icon-credit-card:before {
  content: "\e025"; }

.icon-paypal:before {
  content: "\e608"; }

.icon-social-tumblr:before {
  content: "\e00a"; }

.icon-social-twitter:before {
  content: "\e009"; }

.icon-social-facebook:before {
  content: "\e00b"; }

.icon-social-instagram:before {
  content: "\e609"; }

.icon-social-linkedin:before {
  content: "\e60a"; }

.icon-social-pinterest:before {
  content: "\e60b"; }

.icon-social-github:before {
  content: "\e60c"; }

.icon-social-google:before {
  content: "\e60d"; }

.icon-social-reddit:before {
  content: "\e60e"; }

.icon-social-skype:before {
  content: "\e60f"; }

.icon-social-dribbble:before {
  content: "\e00d"; }

.icon-social-behance:before {
  content: "\e610"; }

.icon-social-foursqare:before {
  content: "\e611"; }

.icon-social-soundcloud:before {
  content: "\e612"; }

.icon-social-spotify:before {
  content: "\e613"; }

.icon-social-stumbleupon:before {
  content: "\e614"; }

.icon-social-youtube:before {
  content: "\e008"; }

.icon-social-dropbox:before {
  content: "\e00c"; }

.icon-social-vkontakte:before {
  content: "\e618"; }

.icon-social-steam:before {
  content: "\e620"; }

/*
* SliderPro v1.3
* Homepage: http://bqworks.com/slider-pro/
* Author: bqworks
* Author URL: http://bqworks.com/
*/
/* 5 :: SLIDER PRO */
.slider-pro {
  position: relative;
  margin: 0 auto; }

.sp-slides-container {
  position: relative; }

.sp-mask {
  position: relative;
  overflow: hidden; }

.sp-slides {
  position: relative;
  -webkit-backface-visibility: hidden;
  -webkit-perspective: 1000; }

.sp-slide {
  position: absolute; }

.sp-image-container {
  overflow: hidden; }

.sp-image {
  position: relative;
  display: block;
  border: none; }

.sp-no-js {
  overflow: hidden;
  max-width: 100%; }

/*  5.1 :: SliderPro Thumbnails */
.sp-thumbnails-container {
  position: relative;
  overflow: hidden;
  direction: ltr; }

.sp-top-thumbnails, .sp-bottom-thumbnails {
  left: 0;
  margin: 0 auto; }

.sp-top-thumbnails {
  position: absolute;
  top: 0;
  margin-bottom: 4px; }

.sp-bottom-thumbnails {
  margin-top: 4px; }

.sp-left-thumbnails, .sp-right-thumbnails {
  position: absolute;
  top: 0; }

.sp-right-thumbnails {
  right: 0;
  margin-left: 4px; }

.sp-left-thumbnails {
  left: 0;
  margin-right: 4px; }

.sp-thumbnails {
  position: relative; }

.sp-thumbnail {
  border: none; }

.sp-thumbnail-container {
  position: relative;
  display: block;
  overflow: hidden;
  float: left;
  -moz-box-sizing: border-box;
  box-sizing: border-box; }

.sp-rtl .sp-thumbnail-container {
  float: right; }

.sp-top-thumbnails .sp-thumbnail-container, .sp-bottom-thumbnails .sp-thumbnail-container {
  margin-left: 2px;
  margin-right: 2px; }

.sp-top-thumbnails .sp-thumbnail-container:first-child, .sp-bottom-thumbnails .sp-thumbnail-container:first-child {
  margin-left: 0; }

.sp-top-thumbnails .sp-thumbnail-container:last-child, .sp-bottom-thumbnails .sp-thumbnail-container:last-child {
  margin-right: 0; }

.sp-left-thumbnails .sp-thumbnail-container, .sp-right-thumbnails .sp-thumbnail-container {
  margin-top: 2px;
  margin-bottom: 2px; }

.sp-left-thumbnails .sp-thumbnail-container:first-child, .sp-right-thumbnails .sp-thumbnail-container:first-child {
  margin-top: 0; }

.sp-left-thumbnails .sp-thumbnail-container:last-child, .sp-right-thumbnails .sp-thumbnail-container:last-child {
  margin-bottom: 0; }

.sp-right-thumbnails.sp-has-pointer {
  margin-left: -13px; }

.sp-right-thumbnails.sp-has-pointer .sp-thumbnail {
  position: absolute;
  left: 18px;
  margin-left: 0 !important; }

.sp-right-thumbnails.sp-has-pointer .sp-selected-thumbnail:before {
  content: '';
  position: absolute;
  height: 100%;
  border-left: 5px solid #F00;
  left: 0;
  top: 0;
  margin-left: 13px; }

.sp-right-thumbnails.sp-has-pointer .sp-selected-thumbnail:after {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
  left: 0;
  top: 50%;
  margin-top: -8px;
  border-right: 13px solid #F00;
  border-top: 8px solid transparent;
  border-bottom: 8px solid transparent; }

.sp-left-thumbnails.sp-has-pointer {
  margin-right: -13px; }

.sp-left-thumbnails.sp-has-pointer .sp-thumbnail {
  position: absolute;
  right: 18px; }

.sp-left-thumbnails.sp-has-pointer .sp-selected-thumbnail:before {
  content: '';
  position: absolute;
  height: 100%;
  border-left: 5px solid #F00;
  right: 0;
  top: 0;
  margin-right: 13px; }

.sp-left-thumbnails.sp-has-pointer .sp-selected-thumbnail:after {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
  right: 0;
  top: 50%;
  margin-top: -8px;
  border-left: 13px solid #F00;
  border-top: 8px solid transparent;
  border-bottom: 8px solid transparent; }

.sp-bottom-thumbnails.sp-has-pointer {
  margin-top: -13px; }

.sp-bottom-thumbnails.sp-has-pointer .sp-thumbnail {
  position: absolute;
  top: 18px;
  margin-top: 0 !important; }

.sp-bottom-thumbnails.sp-has-pointer .sp-selected-thumbnail:before {
  content: '';
  position: absolute;
  width: 100%;
  border-bottom: 5px solid #F00;
  top: 0;
  margin-top: 13px; }

.sp-bottom-thumbnails.sp-has-pointer .sp-selected-thumbnail:after {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
  left: 50%;
  top: 0;
  margin-left: -8px;
  border-bottom: 13px solid #F00;
  border-left: 8px solid transparent;
  border-right: 8px solid transparent; }

.sp-top-thumbnails.sp-has-pointer {
  margin-bottom: -13px; }

.sp-top-thumbnails.sp-has-pointer .sp-thumbnail {
  position: absolute;
  bottom: 18px; }

.sp-top-thumbnails.sp-has-pointer .sp-selected-thumbnail:before {
  content: '';
  position: absolute;
  width: 100%;
  border-bottom: 5px solid #F00;
  bottom: 0;
  margin-bottom: 13px; }

.sp-top-thumbnails.sp-has-pointer .sp-selected-thumbnail:after {
  content: '';
  position: absolute;
  width: 0;
  height: 0;
  left: 50%;
  bottom: 0;
  margin-left: -8px;
  border-top: 13px solid #F00;
  border-left: 8px solid transparent;
  border-right: 8px solid transparent; }

/* 5.1 :: SliderPro Layers */
.sp-layer {
  -webkit-backface-visibility: hidden; }

/* 5.2 :: SliderPro Touch Swipe */
.sp-grab {
  cursor: url("<?php echo  get_template_directory_uri();?>/images/cursors/openhand.cur"), move; }

.sp-grabbing {
  cursor: url("<?php echo  get_template_directory_uri();?>/images/cursors/closedhand.cur"), move; }

.sp-selectable {
  cursor: default; }

/* 5.3 :: SliderPro Caption */
.sp-caption-container {
  text-align: center;
  margin-top: 10px; }

/* 5.6 :: SliderPro Full Screen */
.sp-full-screen {
  margin: 0 !important;
  background-color: #000; }

.sp-full-screen-button {
  position: absolute;
  top: 5px;
  right: 10px;
  font-size: 30px;
  line-height: 1;
  cursor: pointer;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg); }

.sp-full-screen-button:before {
  content: '\2195'; }

.sp-fade-full-screen {
  opacity: 0;
  -webkit-transition: opacity 0.5s;
  transition: opacity 0.5s; }

.slider-pro:hover .sp-fade-full-screen {
  opacity: 1; }

/* 5.4 :: SliderPro Buttons */
.sp-buttons {
  position: absolute;
  width: 100%;
  text-align: center;
  left: 0;
  bottom: 7rem; }

.sp-rtl .sp-buttons {
  direction: rtl; }

.sp-full-screen .sp-buttons {
  display: none; }

.sp-button {
  width: 8px;
  height: 8px;
  background-color: rgba(255, 255, 255, 0.5);
  border-radius: 50%;
  margin: 4px;
  display: inline-block;
  cursor: pointer;
  -webkit-transition: background-color 0.3s ease-out;
  transition: background-color 0.3s ease-out; }
  .sp-button:hover {
    background-color: rgba(255, 255, 255, 0.75); }

.sp-selected-button {
  background-color: white; }

/* 5.5 :: SliderPro Arrows */
.sp-arrows {
  position: absolute; }

.sp-fade-arrows {
  opacity: 0;
  -webkit-transition: opacity 0.5s;
  transition: opacity 0.5s; }

.sp-slides-container:hover .sp-fade-arrows {
  opacity: 1; }

.sp-horizontal .sp-arrows {
  width: 100%;
  left: 0;
  top: 50%;
  margin-top: -15px; }

.sp-vertical .sp-arrows {
  height: 100%;
  left: 50%;
  top: 0;
  margin-left: -10px; }

.sp-arrow {
  position: absolute;
  display: block;
  width: 8px;
  height: 24px;
  cursor: pointer; }

.sp-vertical .sp-arrow {
  -webkit-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  transform: rotate(90deg); }

.sp-horizontal .sp-previous-arrow {
  left: 20px;
  right: auto; }

.sp-horizontal.sp-rtl .sp-previous-arrow {
  right: 20px;
  left: auto; }

.sp-horizontal .sp-next-arrow {
  right: 20px;
  left: auto; }

.sp-horizontal.sp-rtl .sp-next-arrow {
  left: 20px;
  right: auto; }

.sp-vertical .sp-previous-arrow {
  top: 20px; }

.sp-vertical .sp-next-arrow {
  bottom: 20px;
  -webkit-transform: rotate(270deg);
  -ms-transform: rotate(270deg);
  transform: rotate(270deg); }

.sp-previous-arrow:before, .sp-previous-arrow:after, .sp-next-arrow:before, .sp-next-arrow:after {
  content: '';
  position: absolute;
  width: 50%;
  height: 50%;
  background-color: rgba(255, 255, 255, 0.75);
  -webkit-transition: background-color 0.3s ease-out;
  transition: background-color 0.3s ease-out; }
  .sp-previous-arrow:before:hover, .sp-previous-arrow:after:hover, .sp-next-arrow:before:hover, .sp-next-arrow:after:hover {
    background-color: white; }

.sp-arrow:before {
  left: 30%;
  top: 0;
  -webkit-transform: skew(145deg, 0deg);
  -ms-transform: skew(145deg, 0deg);
  transform: skew(145deg, 0deg); }

.sp-arrow:after {
  left: 30%;
  top: 50%;
  -webkit-transform: skew(-145deg, 0deg);
  -ms-transform: skew(-145deg, 0deg);
  transform: skew(-145deg, 0deg); }

.sp-next-arrow {
  -webkit-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  transform: rotate(180deg); }

.sp-horizontal.sp-rtl .sp-previous-arrow {
  -webkit-transform: rotate(180deg);
  -ms-transform: rotate(180deg);
  transform: rotate(180deg); }

.sp-horizontal.sp-rtl .sp-next-arrow {
  -webkit-transform: rotate(0deg);
  -ms-transform: rotate(0deg);
  transform: rotate(0deg); }

/* 5.6 :: SliderPro Thumbnail Arrows */
.sp-thumbnail-arrows {
  position: absolute; }

.sp-fade-thumbnail-arrows {
  opacity: 0;
  -webkit-transition: opacity 0.5s;
  transition: opacity 0.5s; }

.sp-thumbnails-container:hover .sp-fade-thumbnail-arrows {
  opacity: 1; }

.sp-top-thumbnails .sp-thumbnail-arrows, .sp-bottom-thumbnails .sp-thumbnail-arrows {
  width: 100%;
  top: 50%;
  left: 0;
  margin-top: -12px; }

.sp-left-thumbnails .sp-thumbnail-arrows, .sp-right-thumbnails .sp-thumbnail-arrows {
  height: 100%;
  top: 0;
  left: 50%;
  margin-left: -7px; }

.sp-thumbnail-arrow {
  position: absolute;
  display: block;
  width: 15px;
  height: 25px;
  cursor: pointer; }

.sp-left-thumbnails .sp-thumbnail-arrows .sp-thumbnail-arrow, .sp-right-thumbnails .sp-thumbnail-arrows .sp-thumbnail-arrow {
  -webkit-transform: rotate(90deg);
  -ms-transform: rotate(90deg);
  transform: rotate(90deg); }

.sp-top-thumbnails .sp-previous-thumbnail-arrow, .sp-bottom-thumbnails .sp-previous-thumbnail-arrow {
  left: 0px; }

.sp-top-thumbnails .sp-next-thumbnail-arrow, .sp-bottom-thumbnails .sp-next-thumbnail-arrow {
  right: 0px; }

.sp-left-thumbnails .sp-previous-thumbnail-arrow, .sp-right-thumbnails .sp-previous-thumbnail-arrow {
  top: 0px; }

.sp-left-thumbnails .sp-next-thumbnail-arrow, .sp-right-thumbnails .sp-next-thumbnail-arrow {
  bottom: 0px; }

.sp-previous-thumbnail-arrow:before, .sp-previous-thumbnail-arrow:after, .sp-next-thumbnail-arrow:before, .sp-next-thumbnail-arrow:after {
  content: '';
  position: absolute;
  width: 50%;
  height: 50%;
  background-color: #FFF; }

.sp-previous-thumbnail-arrow:before {
  left: 30%;
  top: 0;
  -webkit-transform: skew(145deg, 0deg);
  -ms-transform: skew(145deg, 0deg);
  transform: skew(145deg, 0deg); }

.sp-previous-thumbnail-arrow:after {
  left: 30%;
  top: 50%;
  -webkit-transform: skew(-145deg, 0deg);
  -ms-transform: skew(-145deg, 0deg);
  transform: skew(-145deg, 0deg); }

.sp-next-thumbnail-arrow:before {
  right: 30%;
  top: 0;
  -webkit-transform: skew(35deg, 0deg);
  -ms-transform: skew(35deg, 0deg);
  transform: skew(35deg, 0deg); }

.sp-next-thumbnail-arrow:after {
  right: 30%;
  top: 50%;
  -webkit-transform: skew(-35deg, 0deg);
  -ms-transform: skew(-35deg, 0deg);
  transform: skew(-35deg, 0deg); }

/* 5.7 :: SliderPro Video */
a.sp-video {
  text-decoration: none; }

a.sp-video img {
  -webkit-backface-visibility: hidden;
  border: none; }

a.sp-video:after {
  content: '\25B6';
  position: absolute;
  width: 45px;
  padding-left: 5px;
  height: 50px;
  border: 2px solid #FFF;
  text-align: center;
  font-size: 30px;
  border-radius: 30px;
  top: 0;
  color: #FFF;
  bottom: 0;
  left: 0;
  right: 0;
  background-color: rgba(0, 0, 0, 0.2);
  margin: auto;
  line-height: 52px; }

/* 6.1 :: ANIMATIONS */
@-webkit-keyframes fade_in {
  0% {
    opacity: 0; }
  100% {
    opacity: 1; } }
@keyframes fade_in {
  0% {
    opacity: 0; }
  100% {
    opacity: 1; } }
@-webkit-keyframes fade_out {
  0% {
    opacity: 1; }
  100% {
    opacity: 0; } }
@keyframes fade_out {
  0% {
    opacity: 1; }
  100% {
    opacity: 0; } }
@-webkit-keyframes fade_in_up {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20%);
    transform: translateY(20%); }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0%);
    transform: translateY(0%); } }
@keyframes fade_in_up {
  0% {
    opacity: 0;
    -webkit-transform: translateY(20%);
    transform: translateY(20%); }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0%);
    transform: translateY(0%); } }
@-webkit-keyframes fade_in_up_big {
  0% {
    opacity: 0;
    -webkit-transform: translateY(50%);
    transform: translateY(50%); }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0%);
    transform: translateY(0%); } }
@keyframes fade_in_up_big {
  0% {
    opacity: 0;
    -webkit-transform: translateY(50%);
    transform: translateY(50%); }
  100% {
    opacity: 1;
    -webkit-transform: translateY(0%);
    transform: translateY(0%); } }
@-webkit-keyframes fade_in_left {
  0% {
    opacity: 0;
    -webkit-transform: translateX(10%);
    transform: translateX(10%); }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0%);
    transform: translateX(0%); } }
@keyframes fade_in_left {
  0% {
    opacity: 0;
    -webkit-transform: translateX(10%);
    transform: translateX(10%); }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0%);
    transform: translateX(0%); } }
@-webkit-keyframes fade_in_right {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-10%);
    transform: translateX(-10%); }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0%);
    transform: translateX(0%); } }
@keyframes fade_in_right {
  0% {
    opacity: 0;
    -webkit-transform: translateX(-10%);
    transform: translateX(-10%); }
  100% {
    opacity: 1;
    -webkit-transform: translateX(0%);
    transform: translateX(0%); } }
.animate {
  -webkit-animation-duration: 1250ms;
  animation-duration: 1250ms;
  -webkit-animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  animation-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1);
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both; }

.animate-fast {
  -webkit-animation-duration: 500ms;
  animation-duration: 500ms; }

.fade-in {
  -webkit-animation-name: fade_in;
  animation-name: fade_in; }

.fade-out {
  -webkit-animation-name: fade_out;
  animation-name: fade_out; }

.fade-in-up {
  -webkit-animation-name: fade_in_up;
  animation-name: fade_in_up; }

.fade-in-up-big {
  -webkit-animation-name: fade_in_up_big;
  animation-name: fade_in_up_big; }

.fade-out-down {
  -webkit-animation-name: fade_out_down;
  animation-name: fade_out_down; }

.fade-in-left {
  -webkit-animation-name: fade_in_left;
  animation-name: fade_in_left; }

.fade-in-right {
  -webkit-animation-name: fade_in_right;
  animation-name: fade_in_right; }

@-webkit-keyframes animate_gradient {
  0% {
    background-position: 0% 50%; }
  50% {
    background-position: 100% 50%; }
  100% {
    background-position: 0% 50%; } }
@keyframes animate_gradient {
  0% {
    background-position: 0% 50%; }
  50% {
    background-position: 100% 50%; }
  100% {
    background-position: 0% 50%; } }
/* 7 :: COLOR PALETTE */
body {
  color: #708198; }

.heading, h1, h2, h3, h4, h5, h6 {
  color: #414c5a; }

.section-heading .paragraph, .lead {
  color: #59687c; }

a, a .heading {
  -webkit-transition: color 0.25s ease-out;
  transition: color 0.25s ease-out; }

a:hover, .btn:hover {
  color: #8089ff; }

.price {
  color: #8089ff; }

.ui-pricing-card .card-header .sub-heading {
  color: #8e9bae; }

/* 7.1 :: Flat Colors */
.text-indigo, .ui-icon-blocks .icon.text-indigo, .ui-card .card-header .heading.text-indigo {
  color: #8089ff; }

.bg-indigo, .ui-card.bg-indigo {
  color: rgba(255, 255, 255, 0.85);
  background-color: #8089ff; }
  .bg-indigo .heading, .bg-indigo .sub-heading, .bg-indigo .ui-icon-block .icon, .bg-indigo a, .bg-indigo .price, .ui-card.bg-indigo .heading, .ui-card.bg-indigo .sub-heading, .ui-card.bg-indigo .ui-icon-block .icon, .ui-card.bg-indigo a, .ui-card.bg-indigo .price {
    color: #FFF; }
  .bg-indigo .section-heading .paragraph, .bg-indigo .lead, .ui-card.bg-indigo .section-heading .paragraph, .ui-card.bg-indigo .lead {
    color: #FFF; }
  .bg-indigo .ui-card, .ui-card.bg-indigo .ui-card {
    color: #8e9bae; }
    .bg-indigo .ui-card .heading, .bg-indigo .ui-card .sub-heading, .ui-card.bg-indigo .ui-card .heading, .ui-card.bg-indigo .ui-card .sub-heading {
      color: #414c5a; }
    .bg-indigo .ui-card .ui-icon-block .icon, .ui-card.bg-indigo .ui-card .ui-icon-block .icon {
      color: #8089ff; }

.text-primary, .ui-icon-blocks .icon.text-primary, .ui-card .card-header .heading.text-primary {
  color: #8089ff; }

.bg-primary, .ui-card.bg-primary {
  color: rgba(255, 255, 255, 0.85);
  background-color: #8089ff; }
  .bg-primary .heading, .bg-primary .sub-heading, .bg-primary .ui-icon-block .icon, .bg-primary a, .bg-primary .price, .ui-card.bg-primary .heading, .ui-card.bg-primary .sub-heading, .ui-card.bg-primary .ui-icon-block .icon, .ui-card.bg-primary a, .ui-card.bg-primary .price {
    color: #FFF; }
  .bg-primary .section-heading .paragraph, .bg-primary .lead, .ui-card.bg-primary .section-heading .paragraph, .ui-card.bg-primary .lead {
    color: #FFF; }
  .bg-primary .ui-card, .ui-card.bg-primary .ui-card {
    color: #8e9bae; }
    .bg-primary .ui-card .heading, .bg-primary .ui-card .sub-heading, .ui-card.bg-primary .ui-card .heading, .ui-card.bg-primary .ui-card .sub-heading {
      color: #414c5a; }
    .bg-primary .ui-card .ui-icon-block .icon, .ui-card.bg-primary .ui-card .ui-icon-block .icon {
      color: #8089ff; }

.text-blue, .ui-icon-blocks .icon.text-blue, .ui-card .card-header .heading.text-blue {
  color: #54ceff; }

.bg-blue, .ui-card.bg-blue {
  color: rgba(255, 255, 255, 0.85);
  background-color: #54ceff; }
  .bg-blue .heading, .bg-blue .sub-heading, .bg-blue .ui-icon-block .icon, .bg-blue a, .bg-blue .price, .ui-card.bg-blue .heading, .ui-card.bg-blue .sub-heading, .ui-card.bg-blue .ui-icon-block .icon, .ui-card.bg-blue a, .ui-card.bg-blue .price {
    color: #FFF; }
  .bg-blue .section-heading .paragraph, .bg-blue .lead, .ui-card.bg-blue .section-heading .paragraph, .ui-card.bg-blue .lead {
    color: #FFF; }
  .bg-blue .ui-card, .ui-card.bg-blue .ui-card {
    color: #8e9bae; }
    .bg-blue .ui-card .heading, .bg-blue .ui-card .sub-heading, .ui-card.bg-blue .ui-card .heading, .ui-card.bg-blue .ui-card .sub-heading {
      color: #414c5a; }
    .bg-blue .ui-card .ui-icon-block .icon, .ui-card.bg-blue .ui-card .ui-icon-block .icon {
      color: #8089ff; }

.text-purple, .ui-icon-blocks .icon.text-purple, .ui-card .card-header .heading.text-purple {
  color: #e64ad4; }

.bg-purple, .ui-card.bg-purple {
  color: rgba(255, 255, 255, 0.85);
  background-color: #c961f7; }
  .bg-purple .heading, .bg-purple .sub-heading, .bg-purple .ui-icon-block .icon, .bg-purple a, .bg-purple .price, .ui-card.bg-purple .heading, .ui-card.bg-purple .sub-heading, .ui-card.bg-purple .ui-icon-block .icon, .ui-card.bg-purple a, .ui-card.bg-purple .price {
    color: #FFF; }
  .bg-purple .section-heading .paragraph, .bg-purple .lead, .ui-card.bg-purple .section-heading .paragraph, .ui-card.bg-purple .lead {
    color: #FFF; }
  .bg-purple .ui-card, .ui-card.bg-purple .ui-card {
    color: #8e9bae; }
    .bg-purple .ui-card .heading, .bg-purple .ui-card .sub-heading, .ui-card.bg-purple .ui-card .heading, .ui-card.bg-purple .ui-card .sub-heading {
      color: #414c5a; }
    .bg-purple .ui-card .ui-icon-block .icon, .ui-card.bg-purple .ui-card .ui-icon-block .icon {
      color: #8089ff; }

.text-pink, .ui-icon-blocks .icon.text-pink, .ui-card .card-header .heading.text-pink {
  color: #fd81b5; }

.bg-pink, .ui-card.bg-pink {
  color: rgba(255, 255, 255, 0.85);
  background-color: #fd81b5; }
  .bg-pink .heading, .bg-pink .sub-heading, .bg-pink .ui-icon-block .icon, .bg-pink a, .bg-pink .price, .ui-card.bg-pink .heading, .ui-card.bg-pink .sub-heading, .ui-card.bg-pink .ui-icon-block .icon, .ui-card.bg-pink a, .ui-card.bg-pink .price {
    color: #FFF; }
  .bg-pink .section-heading .paragraph, .bg-pink .lead, .ui-card.bg-pink .section-heading .paragraph, .ui-card.bg-pink .lead {
    color: #FFF; }
  .bg-pink .ui-card, .ui-card.bg-pink .ui-card {
    color: #8e9bae; }
    .bg-pink .ui-card .heading, .bg-pink .ui-card .sub-heading, .ui-card.bg-pink .ui-card .heading, .ui-card.bg-pink .ui-card .sub-heading {
      color: #414c5a; }
    .bg-pink .ui-card .ui-icon-block .icon, .ui-card.bg-pink .ui-card .ui-icon-block .icon {
      color: #8089ff; }

.text-green, .ui-icon-blocks .icon.text-green, .ui-card .card-header .heading.text-green {
  color: #19d9b4; }

.bg-green, .ui-card.bg-green {
  color: rgba(255, 255, 255, 0.85);
  background-color: #19d9b4; }
  .bg-green .heading, .bg-green .sub-heading, .bg-green .ui-icon-block .icon, .bg-green a, .bg-green .price, .ui-card.bg-green .heading, .ui-card.bg-green .sub-heading, .ui-card.bg-green .ui-icon-block .icon, .ui-card.bg-green a, .ui-card.bg-green .price {
    color: #FFF; }
  .bg-green .section-heading .paragraph, .bg-green .lead, .ui-card.bg-green .section-heading .paragraph, .ui-card.bg-green .lead {
    color: #FFF; }
  .bg-green .ui-card, .ui-card.bg-green .ui-card {
    color: #8e9bae; }
    .bg-green .ui-card .heading, .bg-green .ui-card .sub-heading, .ui-card.bg-green .ui-card .heading, .ui-card.bg-green .ui-card .sub-heading {
      color: #414c5a; }
    .bg-green .ui-card .ui-icon-block .icon, .ui-card.bg-green .ui-card .ui-icon-block .icon {
      color: #8089ff; }

.text-lime, .ui-icon-blocks .icon.text-lime, .ui-card .card-header .heading.text-lime {
  color: #84ce65; }

.bg-lime, .ui-card.bg-lime {
  color: #FFF;
  background-color:#EC376C; }
  .bg-lime .heading, .bg-lime .sub-heading, .bg-lime .ui-icon-block .icon, .bg-lime a, .bg-lime .price, .ui-card.bg-lime .heading, .ui-card.bg-lime .sub-heading, .ui-card.bg-lime .ui-icon-block .icon, .ui-card.bg-lime a, .ui-card.bg-lime .price {
    color: #FFF; }
  .bg-lime .section-heading .paragraph, .bg-lime .lead, .ui-card.bg-lime .section-heading .paragraph, .ui-card.bg-lime .lead {
    color: #FFF; }
  .bg-lime .ui-card, .ui-card.bg-lime .ui-card {
    color: #8e9bae; }
    .bg-lime .ui-card .heading, .bg-lime .ui-card .sub-heading, .ui-card.bg-lime .ui-card .heading, .ui-card.bg-lime .ui-card .sub-heading {
      color: #414c5a; }
    .bg-lime .ui-card .ui-icon-block .icon, .ui-card.bg-lime .ui-card .ui-icon-block .icon {
      color: #8089ff; }

.text-orange, .ui-icon-blocks .icon.text-orange, .ui-card .card-header .heading.text-orange {
  color: #ff8765; }

.bg-orange, .ui-card.bg-orange {
  color: rgba(255, 255, 255, 0.85);
  background-color: #ff8765; }
  .bg-orange .heading, .bg-orange .sub-heading, .bg-orange .ui-icon-block .icon, .bg-orange a, .bg-orange .price, .ui-card.bg-orange .heading, .ui-card.bg-orange .sub-heading, .ui-card.bg-orange .ui-icon-block .icon, .ui-card.bg-orange a, .ui-card.bg-orange .price {
    color: #FFF; }
  .bg-orange .section-heading .paragraph, .bg-orange .lead, .ui-card.bg-orange .section-heading .paragraph, .ui-card.bg-orange .lead {
    color: #FFF; }
  .bg-orange .ui-card, .ui-card.bg-orange .ui-card {
    color: #8e9bae; }
    .bg-orange .ui-card .heading, .bg-orange .ui-card .sub-heading, .ui-card.bg-orange .ui-card .heading, .ui-card.bg-orange .ui-card .sub-heading {
      color: #414c5a; }
    .bg-orange .ui-card .ui-icon-block .icon, .ui-card.bg-orange .ui-card .ui-icon-block .icon {
      color: #8089ff; }

.text-red, .ui-icon-blocks .icon.text-red, .ui-card .card-header .heading.text-red {
  color: #fe60a1; }

.bg-red, .ui-card.bg-red {
  color: rgba(255, 255, 255, 0.85);
  background-color: #734DF2; }
  .bg-red .heading, .bg-red .sub-heading, .bg-red .ui-icon-block .icon, .bg-red a, .bg-red .price, .ui-card.bg-red .heading, .ui-card.bg-red .sub-heading, .ui-card.bg-red .ui-icon-block .icon, .ui-card.bg-red a, .ui-card.bg-red .price {
    color: #FFF; }
  .bg-red .section-heading .paragraph, .bg-red .lead, .ui-card.bg-red .section-heading .paragraph, .ui-card.bg-red .lead {
    color: #FFF; }
  .bg-red .ui-card, .ui-card.bg-red .ui-card {
    color: #8e9bae; }
    .bg-red .ui-card .heading, .bg-red .ui-card .sub-heading, .ui-card.bg-red .ui-card .heading, .ui-card.bg-red .ui-card .sub-heading {
      color: #414c5a; }
    .bg-red .ui-card .ui-icon-block .icon, .ui-card.bg-red .ui-card .ui-icon-block .icon {
      color: #8089ff; }

.text-gray, .ui-icon-blocks .icon.text-gray, .ui-card .card-header .heading.text-gray {
  color: #708198; }

.bg-gray, .ui-card.bg-gray {
  color: rgba(255, 255, 255, 0.85);
  background-color: #708198; }
  .bg-gray .heading, .bg-gray .sub-heading, .bg-gray .ui-icon-block .icon, .bg-gray a, .bg-gray .price, .ui-card.bg-gray .heading, .ui-card.bg-gray .sub-heading, .ui-card.bg-gray .ui-icon-block .icon, .ui-card.bg-gray a, .ui-card.bg-gray .price {
    color: #FFF; }
  .bg-gray .section-heading .paragraph, .bg-gray .lead, .ui-card.bg-gray .section-heading .paragraph, .ui-card.bg-gray .lead {
    color: #FFF; }
  .bg-gray .ui-card, .ui-card.bg-gray .ui-card {
    color: #8e9bae; }
    .bg-gray .ui-card .heading, .bg-gray .ui-card .sub-heading, .ui-card.bg-gray .ui-card .heading, .ui-card.bg-gray .ui-card .sub-heading {
      color: #414c5a; }
    .bg-gray .ui-card .ui-icon-block .icon, .ui-card.bg-gray .ui-card .ui-icon-block .icon {
      color: #8089ff; }

.text-dark-gray, .ui-icon-blocks .icon.text-dark-gray, .ui-card .card-header .heading.text-dark-gray {
  color: #59687c; }

.bg-dark-gray, .ui-card.bg-dark-gray {
  color: rgba(255, 255, 255, 0.85);
  background-color: #59687c; }
  .bg-dark-gray .heading, .bg-dark-gray .sub-heading, .bg-dark-gray .ui-icon-block .icon, .bg-dark-gray a, .bg-dark-gray .price, .ui-card.bg-dark-gray .heading, .ui-card.bg-dark-gray .sub-heading, .ui-card.bg-dark-gray .ui-icon-block .icon, .ui-card.bg-dark-gray a, .ui-card.bg-dark-gray .price {
    color: #FFF; }
  .bg-dark-gray .section-heading .paragraph, .bg-dark-gray .lead, .ui-card.bg-dark-gray .section-heading .paragraph, .ui-card.bg-dark-gray .lead {
    color: #FFF; }
  .bg-dark-gray .ui-card, .ui-card.bg-dark-gray .ui-card {
    color: #8e9bae; }
    .bg-dark-gray .ui-card .heading, .bg-dark-gray .ui-card .sub-heading, .ui-card.bg-dark-gray .ui-card .heading, .ui-card.bg-dark-gray .ui-card .sub-heading {
      color: #414c5a; }
    .bg-dark-gray .ui-card .ui-icon-block .icon, .ui-card.bg-dark-gray .ui-card .ui-icon-block .icon {
      color: #8089ff; }

/* 7.2 :: Gradients */
.ui-gradient-purple {
  background: -webkit-linear-gradient(45deg, #fd81b5 0%, #c961f7 50%, #8089ff 100%);
  background: linear-gradient(45deg, #fd81b5 0%, #c961f7 50%, #8089ff 100%); }

.ui-gradient-animator, .ui-gradient-purple {
  color: rgba(255, 255, 255, 0.85); }
  .ui-gradient-animator .heading, .ui-gradient-animator .sub-heading, .ui-gradient-animator .ui-icon-block .icon, .ui-gradient-animator a, .ui-gradient-animator .price, .ui-gradient-purple .heading, .ui-gradient-purple .sub-heading, .ui-gradient-purple .ui-icon-block .icon, .ui-gradient-purple a, .ui-gradient-purple .price {
    color: #FFF; }
  .ui-gradient-animator .section-heading .paragraph, .ui-gradient-animator .lead, .ui-gradient-purple .section-heading .paragraph, .ui-gradient-purple .lead {
    color: #FFF; }
  .ui-gradient-animator .ui-card, .ui-gradient-purple .ui-card {
    color: #8e9bae; }
    .ui-gradient-animator .ui-card .heading, .ui-gradient-animator .ui-card .sub-heading, .ui-gradient-purple .ui-card .heading, .ui-gradient-purple .ui-card .sub-heading {
      color: #414c5a; }
    .ui-gradient-animator .ui-card .ui-icon-block .icon, .ui-gradient-purple .ui-card .ui-icon-block .icon {
      color: #8089ff; }
  .ui-gradient-animator .ui-tabs .nav-tabs li, .ui-gradient-purple .ui-tabs .nav-tabs li {
    background-color: rgba(255, 255, 255, 0); }
    .ui-gradient-animator .ui-tabs .nav-tabs li a, .ui-gradient-purple .ui-tabs .nav-tabs li a {
      color: #FFF; }
    .ui-gradient-animator .ui-tabs .nav-tabs li.active, .ui-gradient-purple .ui-tabs .nav-tabs li.active {
      background-color: rgba(255, 255, 255, 0.25); }
      .ui-gradient-animator .ui-tabs .nav-tabs li.active a, .ui-gradient-purple .ui-tabs .nav-tabs li.active a {
        color: #FFF; }
  .ui-gradient-animator .ui-checklist li, .ui-gradient-purple .ui-checklist li {
    border-bottom-color: rgba(255, 255, 255, 0.2); }
  .ui-gradient-animator .owl-theme .owl-dots .owl-dot span, .ui-gradient-purple .owl-theme .owl-dots .owl-dot span {
    background-color: rgba(255, 255, 255, 0.5); }
  .ui-gradient-animator .owl-theme .owl-dots .owl-dot.active span, .ui-gradient-purple .owl-theme .owl-dots .owl-dot.active span {
    background-color: white; }
  .ui-gradient-animator .owl-theme .owl-nav [class*='owl-'], .ui-gradient-purple .owl-theme .owl-nav [class*='owl-'] {
    color: rgba(255, 255, 255, 0.5); }
  .ui-gradient-animator .owl-theme .owl-nav [class*='owl-']:hover, .ui-gradient-purple .owl-theme .owl-nav [class*='owl-']:hover {
    color: white; }

.btn.ui-gradient-purple {
  color: #FFF; }

.bg-overlay-gradient-purple {
  color: rgba(255, 255, 255, 0.85); }
  .bg-overlay-gradient-purple .heading, .bg-overlay-gradient-purple .sub-heading, .bg-overlay-gradient-purple .ui-icon-block .icon, .bg-overlay-gradient-purple .section-heading .paragraph, .bg-overlay-gradient-purple .lead {
    color: #FFF; }
  .bg-overlay-gradient-purple::before {
    background: -webkit-linear-gradient(45deg, #fd81b5 0%, #c961f7 50%, #8089ff 100%);
    background: linear-gradient(45deg, #fd81b5 0%, #c961f7 50%, #8089ff 100%); }

.ui-card.ui-curve .card-header.ui-gradient-purple {
  color: rgba(255, 255, 255, 0.85);
  background: -webkit-linear-gradient(45deg, #fd81b5 0%, #c961f7 50%, #8089ff 100%);
  background: linear-gradient(45deg, #fd81b5 0%, #c961f7 50%, #8089ff 100%); }
  .ui-card.ui-curve .card-header.ui-gradient-purple .heading, .ui-card.ui-curve .card-header.ui-gradient-purple .sub-heading, .ui-card.ui-curve .card-header.ui-gradient-purple .ui-icon-block .icon {
    color: #FFF; }

.ui-gradient-peach {
  background: -moz-linear-gradient(45deg, #ececec 0%, #ccc 100%);
  background: linear-gradient(45deg, #ececec 0%, #ccc 100%); }

.ui-gradient-animator, .ui-gradient-peach {
  color: rgba(255, 255, 255, 0.85); }
  .ui-gradient-animator .heading, .ui-gradient-animator .sub-heading, .ui-gradient-animator .ui-icon-block .icon, .ui-gradient-animator a, .ui-gradient-animator .price, .ui-gradient-peach .heading, .ui-gradient-peach .sub-heading, .ui-gradient-peach .ui-icon-block .icon, .ui-gradient-peach a, .ui-gradient-peach .price {
    color: #FFF; }
  .ui-gradient-animator .section-heading .paragraph, .ui-gradient-animator .lead, .ui-gradient-peach .section-heading .paragraph, .ui-gradient-peach .lead {
    color: #FFF; }
  .ui-gradient-animator .ui-card, .ui-gradient-peach .ui-card {
    color: #8e9bae; }
    .ui-gradient-animator .ui-card .heading, .ui-gradient-animator .ui-card .sub-heading, .ui-gradient-peach .ui-card .heading, .ui-gradient-peach .ui-card .sub-heading {
      color: #414c5a; }
    .ui-gradient-animator .ui-card .ui-icon-block .icon, .ui-gradient-peach .ui-card .ui-icon-block .icon {
      color: #8089ff; }
  .ui-gradient-animator .ui-tabs .nav-tabs li, .ui-gradient-peach .ui-tabs .nav-tabs li {
    background-color: rgba(255, 255, 255, 0); }
    .ui-gradient-animator .ui-tabs .nav-tabs li a, .ui-gradient-peach .ui-tabs .nav-tabs li a {
      color: #FFF; }
    .ui-gradient-animator .ui-tabs .nav-tabs li.active, .ui-gradient-peach .ui-tabs .nav-tabs li.active {
      background-color: rgba(255, 255, 255, 0.25); }
      .ui-gradient-animator .ui-tabs .nav-tabs li.active a, .ui-gradient-peach .ui-tabs .nav-tabs li.active a {
        color: #FFF; }
  .ui-gradient-animator .ui-checklist li, .ui-gradient-peach .ui-checklist li {
    border-bottom-color: rgba(255, 255, 255, 0.2); }
  .ui-gradient-animator .owl-theme .owl-dots .owl-dot span, .ui-gradient-peach .owl-theme .owl-dots .owl-dot span {
    background-color: rgba(255, 255, 255, 0.5); }
  .ui-gradient-animator .owl-theme .owl-dots .owl-dot.active span, .ui-gradient-peach .owl-theme .owl-dots .owl-dot.active span {
    background-color: white; }
  .ui-gradient-animator .owl-theme .owl-nav [class*='owl-'], .ui-gradient-peach .owl-theme .owl-nav [class*='owl-'] {
    color: rgba(255, 255, 255, 0.5); }
  .ui-gradient-animator .owl-theme .owl-nav [class*='owl-']:hover, .ui-gradient-peach .owl-theme .owl-nav [class*='owl-']:hover {
    color: white; }

.btn.ui-gradient-peach {
  color: #FFF; }

.bg-overlay-gradient-peach {
  color: rgba(255, 255, 255, 0.85); }
  .bg-overlay-gradient-peach .heading, .bg-overlay-gradient-peach .sub-heading, .bg-overlay-gradient-peach .ui-icon-block .icon, .bg-overlay-gradient-peach .section-heading .paragraph, .bg-overlay-gradient-peach .lead {
    color: #FFF; }
  .bg-overlay-gradient-peach::before {
    background: -moz-linear-gradient(45deg, #fe60a1 0%, #ff8765 100%);
    background: linear-gradient(45deg, #fe60a1 0%, #ff8765 100%); }

.ui-card.ui-curve .card-header.ui-gradient-peach {
  color: rgba(255, 255, 255, 0.85);
  background: -moz-linear-gradient(45deg, #fe60a1 0%, #ff8765 100%);
  background: linear-gradient(45deg, #fe60a1 0%, #ff8765 100%); }
  .ui-card.ui-curve .card-header.ui-gradient-peach .heading, .ui-card.ui-curve .card-header.ui-gradient-peach .sub-heading, .ui-card.ui-curve .card-header.ui-gradient-peach .ui-icon-block .icon {
    color: #FFF; }

.ui-gradient-green {
  background: -moz-linear-gradient(45deg, #19d9b4 0%, #92d275 100%);
  background: linear-gradient(45deg, #19d9b4 0%, #92d275 100%); }

.ui-gradient-animator, .ui-gradient-green {
  color: rgba(255, 255, 255, 0.85); }
  .ui-gradient-animator .heading, .ui-gradient-animator .sub-heading, .ui-gradient-animator .ui-icon-block .icon, .ui-gradient-animator a, .ui-gradient-animator .price, .ui-gradient-green .heading, .ui-gradient-green .sub-heading, .ui-gradient-green .ui-icon-block .icon, .ui-gradient-green a, .ui-gradient-green .price {
    color: #FFF; }
  .ui-gradient-animator .section-heading .paragraph, .ui-gradient-animator .lead, .ui-gradient-green .section-heading .paragraph, .ui-gradient-green .lead {
    color: #FFF; }
  .ui-gradient-animator .ui-card, .ui-gradient-green .ui-card {
    color: #8e9bae; }
    .ui-gradient-animator .ui-card .heading, .ui-gradient-animator .ui-card .sub-heading, .ui-gradient-green .ui-card .heading, .ui-gradient-green .ui-card .sub-heading {
      color: #414c5a; }
    .ui-gradient-animator .ui-card .ui-icon-block .icon, .ui-gradient-green .ui-card .ui-icon-block .icon {
      color: #8089ff; }
  .ui-gradient-animator .ui-tabs .nav-tabs li, .ui-gradient-green .ui-tabs .nav-tabs li {
    background-color: rgba(255, 255, 255, 0); }
    .ui-gradient-animator .ui-tabs .nav-tabs li a, .ui-gradient-green .ui-tabs .nav-tabs li a {
      color: #FFF; }
    .ui-gradient-animator .ui-tabs .nav-tabs li.active, .ui-gradient-green .ui-tabs .nav-tabs li.active {
      background-color: rgba(255, 255, 255, 0.25); }
      .ui-gradient-animator .ui-tabs .nav-tabs li.active a, .ui-gradient-green .ui-tabs .nav-tabs li.active a {
        color: #FFF; }
  .ui-gradient-animator .ui-checklist li, .ui-gradient-green .ui-checklist li {
    border-bottom-color: rgba(255, 255, 255, 0.2); }
  .ui-gradient-animator .owl-theme .owl-dots .owl-dot span, .ui-gradient-green .owl-theme .owl-dots .owl-dot span {
    background-color: rgba(255, 255, 255, 0.5); }
  .ui-gradient-animator .owl-theme .owl-dots .owl-dot.active span, .ui-gradient-green .owl-theme .owl-dots .owl-dot.active span {
    background-color: white; }
  .ui-gradient-animator .owl-theme .owl-nav [class*='owl-'], .ui-gradient-green .owl-theme .owl-nav [class*='owl-'] {
    color: rgba(255, 255, 255, 0.5); }
  .ui-gradient-animator .owl-theme .owl-nav [class*='owl-']:hover, .ui-gradient-green .owl-theme .owl-nav [class*='owl-']:hover {
    color: white; }

.btn.ui-gradient-green {
  color: #FFF; }

.bg-overlay-gradient-green {
  color: rgba(255, 255, 255, 0.85); }
  .bg-overlay-gradient-green .heading, .bg-overlay-gradient-green .sub-heading, .bg-overlay-gradient-green .ui-icon-block .icon, .bg-overlay-gradient-green .section-heading .paragraph, .bg-overlay-gradient-green .lead {
    color: #FFF; }
  .bg-overlay-gradient-green::before {
    background: -moz-linear-gradient(45deg, #19d9b4 0%, #92d275 100%);
    background: linear-gradient(45deg, #19d9b4 0%, #92d275 100%); }

.ui-card.ui-curve .card-header.ui-gradient-green {
  color: rgba(255, 255, 255, 0.85);
  background: -moz-linear-gradient(45deg, #19d9b4 0%, #92d275 100%);
  background: linear-gradient(45deg, #19d9b4 0%, #92d275 100%); }
  .ui-card.ui-curve .card-header.ui-gradient-green .heading, .ui-card.ui-curve .card-header.ui-gradient-green .sub-heading, .ui-card.ui-curve .card-header.ui-gradient-green .ui-icon-block .icon {
    color: #FFF; }

.ui-gradient-blue {
  background: -moz-linear-gradient(45deg, #8089ff 0%, #54ceff 100%);
  background: linear-gradient(45deg, #8089ff 0%, #54ceff 100%); }

.ui-gradient-animator, .ui-gradient-blue {
  color: rgba(255, 255, 255, 0.85); }
  .ui-gradient-animator .heading, .ui-gradient-animator .sub-heading, .ui-gradient-animator .ui-icon-block .icon, .ui-gradient-animator a, .ui-gradient-animator .price, .ui-gradient-blue .heading, .ui-gradient-blue .sub-heading, .ui-gradient-blue .ui-icon-block .icon, .ui-gradient-blue a, .ui-gradient-blue .price {
    color: #FFF; }
  .ui-gradient-animator .section-heading .paragraph, .ui-gradient-animator .lead, .ui-gradient-blue .section-heading .paragraph, .ui-gradient-blue .lead {
    color: #FFF; }
  .ui-gradient-animator .ui-card, .ui-gradient-blue .ui-card {
    color: #8e9bae; }
    .ui-gradient-animator .ui-card .heading, .ui-gradient-animator .ui-card .sub-heading, .ui-gradient-blue .ui-card .heading, .ui-gradient-blue .ui-card .sub-heading {
      color: #414c5a; }
    .ui-gradient-animator .ui-card .ui-icon-block .icon, .ui-gradient-blue .ui-card .ui-icon-block .icon {
      color: #8089ff; }
  .ui-gradient-animator .ui-tabs .nav-tabs li, .ui-gradient-blue .ui-tabs .nav-tabs li {
    background-color: rgba(255, 255, 255, 0); }
    .ui-gradient-animator .ui-tabs .nav-tabs li a, .ui-gradient-blue .ui-tabs .nav-tabs li a {
      color: #FFF; }
    .ui-gradient-animator .ui-tabs .nav-tabs li.active, .ui-gradient-blue .ui-tabs .nav-tabs li.active {
      background-color: rgba(255, 255, 255, 0.25); }
      .ui-gradient-animator .ui-tabs .nav-tabs li.active a, .ui-gradient-blue .ui-tabs .nav-tabs li.active a {
        color: #FFF; }
  .ui-gradient-animator .ui-checklist li, .ui-gradient-blue .ui-checklist li {
    border-bottom-color: rgba(255, 255, 255, 0.2); }
  .ui-gradient-animator .owl-theme .owl-dots .owl-dot span, .ui-gradient-blue .owl-theme .owl-dots .owl-dot span {
    background-color: rgba(255, 255, 255, 0.5); }
  .ui-gradient-animator .owl-theme .owl-dots .owl-dot.active span, .ui-gradient-blue .owl-theme .owl-dots .owl-dot.active span {
    background-color: white; }
  .ui-gradient-animator .owl-theme .owl-nav [class*='owl-'], .ui-gradient-blue .owl-theme .owl-nav [class*='owl-'] {
    color: rgba(255, 255, 255, 0.5); }
  .ui-gradient-animator .owl-theme .owl-nav [class*='owl-']:hover, .ui-gradient-blue .owl-theme .owl-nav [class*='owl-']:hover {
    color: white; }

.btn.ui-gradient-blue {
  color: #FFF; }

.bg-overlay-gradient-blue {
  color: rgba(255, 255, 255, 0.85); }
  .bg-overlay-gradient-blue .heading, .bg-overlay-gradient-blue .sub-heading, .bg-overlay-gradient-blue .ui-icon-block .icon, .bg-overlay-gradient-blue .section-heading .paragraph, .bg-overlay-gradient-blue .lead {
    color: #FFF; }
  .bg-overlay-gradient-blue::before {
    background: -moz-linear-gradient(45deg, #8089ff 0%, #54ceff 100%);
    background: linear-gradient(45deg, #8089ff 0%, #54ceff 100%); }

.ui-card.ui-curve .card-header.ui-gradient-blue {
  color: rgba(255, 255, 255, 0.85);
  background: -moz-linear-gradient(45deg, #8089ff 0%, #54ceff 100%);
  background: linear-gradient(45deg, #8089ff 0%, #54ceff 100%); }
  .ui-card.ui-curve .card-header.ui-gradient-blue .heading, .ui-card.ui-curve .card-header.ui-gradient-blue .sub-heading, .ui-card.ui-curve .card-header.ui-gradient-blue .ui-icon-block .icon {
    color: #FFF; }

.bg-light {
  background-color: #f6f7f8; }

/* 8 :: MEDIA */
.ui-app-icon {
  display: inline-block;
  width: 90px;
  height: 90px;
  margin: 0 auto 2rem auto;
  border-radius: 1.25rem;
  overflow: hidden; }
  .ui-app-icon img {
    width: 90px;
    height: 90px; }

@media (max-width: 739px) {
  img.responsive-on-sm {
    height: auto;
    width: 100%;
    max-width: 100%; } }

[data-max_width] {
  margin-left: auto;
  margin-right: auto;
  display: block; }

/* 9 :: SHADOWS */
.shadow-sm {
  box-shadow: 0 1px 3px rgba(0, 9, 128, 0.05), 0 2px 5px rgba(0, 9, 128, 0.035); }

.btn.shadow-sm {
  box-shadow: 0 1px 3px rgba(0, 9, 128, 0.05), 0 2px 5px rgba(0, 9, 128, 0.035), inset 0 1px 1px rgba(255, 255, 255, 0.1), inset 0 -1px 1px rgba(0, 0, 0, 0.075); }

.shadow-md {
  box-shadow: 0 3px 5px rgba(0, 9, 128, 0.05), 0 4px 10px rgba(0, 9, 128, 0.035); }

.btn.shadow-md {
  box-shadow: 0 3px 5px rgba(0, 9, 128, 0.05), 0 4px 10px rgba(0, 9, 128, 0.035), inset 0 1px 1px rgba(255, 255, 255, 0.1), inset 0 -1px 1px rgba(0, 0, 0, 0.075); }

.shadow-lg {
  box-shadow: 0 5px 10px rgba(0, 9, 128, 0.035), 0 7px 18px rgba(0, 9, 128, 0.05); }

.btn.shadow-lg {
  box-shadow: 0 5px 10px rgba(0, 9, 128, 0.035), 0 7px 18px rgba(0, 9, 128, 0.05), inset 0 1px 1px rgba(255, 255, 255, 0.1), inset 0 -1px 1px rgba(0, 0, 0, 0.075); }

.shadow-xl {
  box-shadow: 0 7px 15px rgba(0, 9, 128, 0.05), 0 12px 28px rgba(0, 9, 128, 0.075); }

.btn.shadow-xl {
  box-shadow: 0 7px 15px rgba(0, 9, 128, 0.05), 0 12px 28px rgba(0, 9, 128, 0.075), inset 0 1px 1px rgba(255, 255, 255, 0.1), inset 0 -1px 1px rgba(0, 0, 0, 0.075); }

.ui-action-card.shadow-sm:hover {
  box-shadow: 0 5px 10px rgba(0, 9, 128, 0.035), 0 7px 18px rgba(0, 9, 128, 0.05); }
.ui-action-card.shadow-md:hover {
  box-shadow: 0 7px 15px rgba(0, 9, 128, 0.05), 0 12px 28px rgba(0, 9, 128, 0.075); }
.ui-action-card.shadow-lg:hover {
  box-shadow: 0 8px 18px rgba(0, 9, 128, 0.15), 0 15px 35px rgba(0, 9, 128, 0.2); }
.ui-action-card.shadow-xl:hover {
  box-shadow: 0 10px 20px rgba(0, 9, 128, 0.15), 0 20px 48px rgba(0, 9, 128, 0.2); }

/* 10 :: SPACING */
.pt-0, .section.pt-0 {
  padding-top: 0; }

.pb-0, .section.pb-0 {
  padding-bottom: 0; }

.ui-card .card-header.pb-0 {
  padding: 2rem 2rem 0 2rem; }

.mt-0 {
  margin-top: 0; }

.mb-0, .section .section-heading.mb-0 {
  margin-bottom: 0; }

/* 11 :: TYPOGRAPHY */
html {
  font-size: 13px;
  font-weight: 400;
  -ms-text-size-adjust: 100%;
  -webkit-text-size-adjust: 100%;
  text-rendering: optimizeLegibility;
  speak: none;
  -webkit-font-smoothing: antialiased; }
  @media (min-width: 481px) {
    html {
      font-size: 14px; } }
  @media (min-width: 740px) {
    html {
      font-size: 15px; } }
	  @media (min-width: 1369px) {
	  .boxpack1{
		min-height:223px !important;}}
  @media (min-width: 992px) {

    html {
      font-size: 16px; } }

body {
  font-size: 1rem; }

.icon-lg {
  font-size: 3.6rem; }

blockquote {
  position: relative;
  margin: 2.5rem 0;
  border-left: 5px solid #84ce65;
  padding: 1rem 2rem;
  font-size: 1.05rem;
  color: #59687c;
  font-style: italic; }
  blockquote::before {
    display: block;
    position: absolute;
    content: '';
    background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDIxLjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe2ZpbGw6IzgwODlGRjt9Cjwvc3R5bGU+CjxnIGlkPSJRdW90ZW1hcmtzLWxlZnQiPgoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTQwNSwyMDkuOGMtMS0xMS4xLTAuMi00MS41LDI4LjgtODMuNmMyLjItMy4yLDEuOC03LjUtMC45LTEwLjJjLTExLjgtMTEuOC0xOS4yLTE5LjMtMjQuMy0yNC41CgkJYy02LjgtNi45LTkuOC0xMC0xNC40LTE0LjFjLTMtMi43LTcuNi0yLjgtMTAuNi0wLjFjLTUwLjYsNDQtMTA2LjgsMTM1LTk4LjcsMjQ2LjVjNC44LDY1LjUsNTIuNSwxMTMsMTEzLjUsMTEzCgkJYzYyLjYsMCwxMTMuNS01MC45LDExMy41LTExMy41QzUxMiwyNjIuOCw0NjQuNiwyMTMuMiw0MDUsMjA5Ljh6Ii8+Cgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTIwLjksMjA5LjhjLTEtMTEuMS0wLjMtNDEuNCwyOC44LTgzLjZjMi4yLTMuMiwxLjgtNy41LTAuOS0xMC4yYy0xMS44LTExLjgtMTkuMS0xOS4zLTI0LjMtMjQuNQoJCWMtNi44LTYuOS05LjktMTAuMS0xNC40LTE0LjJjLTMtMi43LTcuNi0yLjctMTAuNi0wLjFjLTUwLjYsNDQtMTA2LjgsMTM1LTk4LjcsMjQ2LjV2MGM0LjgsNjUuNCw1Mi41LDExMywxMTMuNSwxMTMKCQljNjIuNiwwLDExMy41LTUwLjksMTEzLjUtMTEzLjVDMjI3LjksMjYyLjgsMTgwLjUsMjEzLjIsMTIwLjksMjA5Ljh6Ii8+CjwvZz4KPC9zdmc+Cg==");
    background-size: cover;
    top: 0;
    left: 1rem;
    width: 60px;
    height: 60px;
    opacity: 0.2; }
  blockquote p {
    margin-bottom: 0; }
  blockquote .author {
    color: #84ce65;
    font-weight: 600;
    margin-top: 1rem;
    font-style: normal; }

.ui-checklist {
  list-style: none;
  padding-left: 0;
  margin-bottom: 2rem; }
  .ui-checklist li {
    position: relative;
    padding-left: 2rem;
    margin-bottom: 1rem; }
    .ui-checklist li:nth-last-child(1) {
      margin-bottom: 0;
      border-bottom: none; }
    .ui-checklist li::before {
      content: '\f058';
      font-family: 'FontAwesome';
      position: absolute;
      left: 0;
      top: 50%;
      line-height: 1;
      margin-top: -0.5rem;
      font-size: 1.2rem; }
    .ui-checklist li .heading {
      font-size: 1rem;
      font-weight: 600;
      margin-bottom: .05rem; }
    .ui-checklist li p {
      margin-bottom: 0; }

.ui-turncate-text {
  overflow: hidden; }

/* 12 :: BASE */
.main {
  overflow: hidden; }

body[data-fade_in="on-load"],
[data-show] {
  opacity: 1; }

*:focus {
  outline: 0 !important; }

/* 13 :: ACCORDION */
.ui-accordion-panel {
  margin-bottom: 2rem; }

.ui-accordion {
  margin-bottom: 1rem;
  backface-visibility: hidden;
  -webkit-backface-visibility: hidden; }
  .ui-accordion .toggle {
    font-family: 'Nunito', sans-serif;
    position: relative;
    margin-bottom: 0;
    margin-top: 0;
    padding: 1rem 1.5rem;
    font-size: 1.1rem;
    font-weight: 700;
    cursor: pointer;
    -webkit-transition: color 0.25s ease-out;
    transition: color 0.25s ease-out; }
    .ui-accordion .toggle:hover {
      color: #c961f7; }
    .ui-accordion .toggle::after {
      font-family: 'FontAwesome';
      content: '\f0d7';
      position: absolute;
      top: 1.15rem;
      font-size: 20px;
      line-height: 16px;
      right: 1.5rem;
      color: #8e9bae;
      -webkit-transition: transform 0.25s ease-out, color 0.25s ease-out;
      transition: transform 0.25s ease-out, color 0.25s ease-out; }
    .ui-accordion .toggle .icon {
      font-size: 1.2rem;
      margin-right: .25rem;
      line-height: .5; }
  .ui-accordion .body {
    display: none;
    padding: 0 1.5rem 1rem 1.5rem; }
    .ui-accordion .body p {
      margin-bottom: .25rem; }
  .ui-accordion.active .toggle {
    color: #c961f7; }
    .ui-accordion.active .toggle::after {
      color: #c961f7;
      -webkit-transform: rotate(-180deg);
      transform: rotate(-180deg); }

/* 14 :: BUTTONS */
.btn {
  font-family: 'Nunito', sans-serif;
  display: inline-block;
  font-size: .9rem;
  padding: .6rem 1.5rem;
  text-transform: uppercase;
  letter-spacing: .03rem; }
  .btn.btn-sm, .btn-group-sm > .btn {
    font-size: .9rem;
    padding: .35rem 1rem; }
  .btn.btn-circle {
    width: 32px;
    line-height: 32px;
    height: 32px;
    padding: 0; }
  @media (min-width: 992px) {
	  .martop20{
		  margin-top:-36px !important;}
    .btn {
      font-size: .95rem;
      padding: .6rem 1.5rem; }
      .btn.btn-circle {
        width: 37px;
        line-height: 37px;
        height: 37px; } }

.actions .btn {
  margin-bottom: 1rem; }
  .actions .btn:nth-last-child(1) {
    margin-right: 0; }
  @media (min-width: 350px) {
    .actions .btn {
      margin-right: 1rem;
      margin-bottom: 0; } }

.btn-download {
  position: relative;
  padding-left: 4rem;
  text-align: left; }
  .btn-download span {
    display: block; }
    .btn-download span:nth-child(1) {
      font-size: 70%; }
  .btn-download::before {
    display: block;
    content: '';
    position: absolute;
    height: 28px;
    width: 28px;
    top: 50%;
    left: 1.5rem;
    margin-top: -14px; }
  .btn-download.btn-app-store::before {
    background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDIxLjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCAzMDUgMzA1IiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCAzMDUgMzA1OyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe2ZpbGw6I0ZGRkZGRjt9Cjwvc3R5bGU+CjxnIGlkPSJYTUxJRF8yMjhfIj4KCTxwYXRoIGlkPSJYTUxJRF8yMjlfIiBjbGFzcz0ic3QwIiBkPSJNNDAuNywxMTIuMUMxNSwxNTYuOSwzMS4zLDIyNC44LDU5LjksMjY1LjljMTQuMiwyMC42LDI4LjYsMzkuMSw0OC40LDM5LjFjMC40LDAsMC43LDAsMS4xLDAKCQljOS4zLTAuNCwxNi0zLjIsMjIuNS02YzcuMy0zLjEsMTQuOC02LjMsMjYuNi02LjNjMTEuMiwwLDE4LjQsMy4xLDI1LjMsNi4xYzYuOCwzLDEzLjksNiwyNC4zLDUuOGMyMi4yLTAuNCwzNS45LTIwLjQsNDcuOS0zNy45CgkJYzEyLjYtMTguNCwxOC45LTM2LjIsMjEtNDNsMC4xLTAuM2MwLjQtMS4yLTAuMi0yLjUtMS4zLTMuMWMwLDAtMC4xLTAuMS0wLjItMC4xYy0zLjktMS42LTM4LjMtMTYuOC0zOC42LTU4LjQKCQljLTAuMy0zMy43LDI1LjgtNTEuNiwzMS01NC44bDAuMi0wLjJjMC42LTAuNCwxLTAuOSwxLjEtMS42YzAuMS0wLjcsMC0xLjMtMC40LTEuOWMtMTgtMjYuNC00NS42LTMwLjMtNTYuNy0zMC44CgkJYy0xLjYtMC4yLTMuMy0wLjItNC45LTAuMmMtMTMuMSwwLTI1LjYsNC45LTM1LjYsOC45Yy02LjksMi43LTEyLjksNS4xLTE3LjEsNS4xYy00LjYsMC0xMC43LTIuNC0xNy42LTUuMgoJCWMtOS4zLTMuNy0xOS45LTcuOS0zMS4xLTcuOWMtMC4zLDAtMC41LDAtMC44LDBDNzguOSw3My42LDU0LjMsODguNSw0MC43LDExMi4xeiIvPgoJPHBhdGggaWQ9IlhNTElEXzIzMF8iIGNsYXNzPSJzdDAiIGQ9Ik0yMTIuMSwwYy0xNS44LDAuNi0zNC43LDEwLjMtNDYsMjMuNmMtOS42LDExLjEtMTksMjkuNy0xNi41LDQ4LjRjMC4yLDEuMiwxLjEsMi4xLDIuMywyLjIKCQljMS4xLDAuMSwyLjEsMC4xLDMuMiwwLjFjMTUuNCwwLDMyLTguNSw0My40LTIyLjNjMTItMTQuNSwxOC0zMy4xLDE2LjItNDkuOEMyMTQuNSwwLjksMjEzLjQsMCwyMTIuMSwweiIvPgo8L2c+Cjwvc3ZnPgo="); }
  .btn-download.btn-google-play::before {
    background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDIxLjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCAyODkuOCAyODkuOCIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgMjg5LjggMjg5Ljg7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4KCS5zdDB7ZmlsbDojRkZGRkZGO30KPC9zdHlsZT4KPGc+Cgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTMuNCwxMy43Yy0wLjcsMi40LTEuMiw1LjEtMS4yLDh2MjQ2LjRjMCwzLDAuNSw1LjUsMS4xLDcuOWwxMzguMy0xMzFDMTUxLjcsMTQ1LDEzLjQsMTMuNywxMy40LDEzLjd6Ii8+Cgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMjA1LjYsOTMuOUw0NC4yLDQuMWMtNi40LTMuOS0xMi44LTQuOS0xOC4xLTMuNWwxMzguOSwxMzEuOUwyMDUuNiw5My45eiIvPgoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTI2NS4xLDEyN2wtNDMuMS0yNGwtNDQuMSw0MS44bDQ1LDQyLjdsNDEuOS0yM0MyODUuMywxNTIuOSwyNzcuOCwxMzQuMSwyNjUuMSwxMjd6Ii8+Cgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMjUuNiwyODkuMWM1LjQsMS41LDExLjksMC42LDE4LjUtMy40bDE2MS45LTg4LjlsLTQxLjQtMzkuNEMxNjQuNywxNTcuNCwyNS42LDI4OS4xLDI1LjYsMjg5LjF6Ii8+CjwvZz4KPC9zdmc+Cg=="); }

/* 15 :: Cards */
.ui-card {
  background-color:#fff;
  border-radius: 0.5rem; }
  .ui-card .card-image {
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem;
    overflow: hidden;
    background-size: cover;
    background-position: center center; }
    .ui-card .card-image img {
      max-width: 100%; }
  .ui-card .card-header {
    padding: 2rem;
    border-top-left-radius: 0.5rem;
    border-top-right-radius: 0.5rem; }
  .ui-card .card-body {
    padding: 2rem;
    border-bottom-left-radius: 0.5rem;
    border-bottom-right-radius: 0.5rem; }
  .ui-card .card-footer {
    padding: 2rem; }

.ui-card.ui-action-card {
  cursor: pointer;
  -webkit-transition: box-shadow 0.35s ease-out;
  transition: box-shadow 0.35s ease-out; }

/* 15.1 :: Card Curved Header */
.ui-card.ui-curve .card-header {
  position: relative;
  background: #fff;
  overflow: hidden; }
  .ui-card.ui-curve .card-header::after {
    display: block;
    content: '';
    height: 100%;
    background: url("<?php echo  get_template_directory_uri();?>/images/svg-layers/curve-layer-gray.svg") bottom no-repeat;
    background-size: contain;
    position: absolute;
    bottom: -2px;
    left: -6px;
    right: -6px;
    z-index: 1; }
  .ui-card.ui-curve .card-header .paragraph {
    display: inline-block;
    max-width: 350px;
    margin-bottom: .25rem; }
.ui-card.ui-curve .card-body {
  background-color: #f6f7f8; }
.ui-card.ui-curve.color-card .card-header::after {
  background: url("<?php echo  get_template_directory_uri();?>/images/svg-layers/curve-layer.svg") bottom no-repeat; }
.ui-card.ui-curve.color-card .card-body {
  background-color: #FFF; }

/* 16 :: COLLAPSIBLE NAV */
.ui-collapsible-nav {
  list-style: none;
  padding-left: 0; }
  .ui-collapsible-nav:before, .ui-collapsible-nav:after {
    content: " ";
    display: table; }
  .ui-collapsible-nav:after {
    clear: both; }
  .ui-collapsible-nav ul {
    opacity: 0;
    padding-left: 1rem;
    list-style: none;
    overflow: hidden;
    -webkit-transition: opacity 0.15s ease-out;
    transition: opacity 0.15s ease-out;
    backface-visibility: hidden;
    -webkit-backface-visibility: hidden; }
    .ui-collapsible-nav ul:before, .ui-collapsible-nav ul:after {
      content: " ";
      display: table; }
    .ui-collapsible-nav ul:after {
      clear: both; }
  .ui-collapsible-nav li {
    line-height: 2; }
    .ui-collapsible-nav li .label {
      font-size: .8rem;
      margin-left: .5rem;
      display: inline-block;
      color: #8e9bae; }
  .ui-collapsible-nav a {
    display: block;
    line-height: 2;
    color: #59687c;
    font-size: 1rem; }
    .ui-collapsible-nav a:hover {
      color: #414c5a;
      text-decoration: none; }
  .ui-collapsible-nav ul a {
    color: #708198;
    font-size: .9rem; }
    .ui-collapsible-nav ul a:hover {
      color: #59687c; }
  .ui-collapsible-nav .toggle {
    position: relative;
    font-weight: 600; }
    .ui-collapsible-nav .toggle::before {
      content: '';
      display: block;
      position: absolute;
      top: 50%;
      right: 0;
      width: 10px;
      height: 10px;
      margin-top: -5px;
      background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQyIDQyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0MiA0MjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIGQ9Ik0zNy4wNTksMTZIMjZWNC45NDFDMjYsMi4yMjQsMjMuNzE4LDAsMjEsMHMtNSwyLjIyNC01LDQuOTQxVjE2SDQuOTQxQzIuMjI0LDE2LDAsMTguMjgyLDAsMjFzMi4yMjQsNSw0Ljk0MSw1SDE2djExLjA1OSAgQzE2LDM5Ljc3NiwxOC4yODIsNDIsMjEsNDJzNS0yLjIyNCw1LTQuOTQxVjI2aDExLjA1OUMzOS43NzYsMjYsNDIsMjMuNzE4LDQyLDIxUzM5Ljc3NiwxNiwzNy4wNTksMTZ6IiBmaWxsPSIjMjQyYTMyIi8+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo=");
      background-size: 10px 10px;
      background-repeat: no-repeat;
      background-position: center;
      opacity: .3; }
    .ui-collapsible-nav .toggle.active::before {
      background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDQyIDQyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA0MiA0MjsiIHhtbDpzcGFjZT0icHJlc2VydmUiIHdpZHRoPSI1MTJweCIgaGVpZ2h0PSI1MTJweCI+CjxwYXRoIGQ9Ik0zNy4wNTksMTZIMjZIMTZINC45NDFDMi4yMjQsMTYsMCwxOC4yODIsMCwyMXMyLjIyNCw1LDQuOTQxLDVIMTZoMTBoMTEuMDU5QzM5Ljc3NiwyNiw0MiwyMy43MTgsNDIsMjEgIFMzOS43NzYsMTYsMzcuMDU5LDE2eiIgZmlsbD0iIzI0MmEzMiIvPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8Zz4KPC9nPgo8L3N2Zz4K"); }
    .ui-collapsible-nav .toggle.active ~ ul {
      opacity: 1;
      -webkit-transition: opacity 0.5s ease-out 0.1s;
      transition: opacity 0.5s ease-out 0.1s; }
    .ui-collapsible-nav .toggle.current-page {
      color: #8089ff; }

/* 17 :: DROPDOWNS */
.dropdown .dropdown-header {
  font-weight: 600;
  text-transform: uppercase; }
.dropdown .dropdown-menu li a {
  font-weight: 600; }

/* 18 :: FOOTER */
.ui-footer {
  position: relative; }
  .ui-footer .footer-bg {
    padding: 8rem 0; }
  .ui-footer .heading, .ui-footer .paragraph {
    margin-top: 0; }
  .ui-footer .heading {
    margin-bottom: 1rem; }
  .ui-footer .paragraph {
    margin-bottom: 0; }
  .ui-footer .actions {
    margin-top: 2.25rem; }
    .ui-footer .actions.social-links {
      margin-top: 4rem;
      margin-bottom: 4rem; }
  .ui-footer .footer-copyright {
    padding: 1.25rem 0; }
    .ui-footer .footer-copyright p {
      font-size: .9rem;
      margin-bottom: 0;
      line-height: 40px; }
  .ui-footer .download-section {
    padding-top: 4rem; }
  @media (min-width: 481px) {
    .ui-footer .heading {
      margin-bottom: 1.25rem; } }
  @media (min-width: 740px) {
    .ui-footer .heading {
      margin-bottom: 1.5rem; } }
  @media (min-width: 992px) {
    .ui-footer .heading {
      margin-bottom: 1.75rem; } }

/* 18.1 :: Subscribe Footer */
.ui-footer.subscribe-footer {
  padding-top: 6rem; }
  .ui-footer.subscribe-footer .form-card {
    max-width: 600px;
    margin: -14rem auto 2rem auto;
    text-align: center; }
    .ui-footer.subscribe-footer .form-card .heading {
      margin-bottom: 1rem; }
    .ui-footer.subscribe-footer .form-card input.form-control {
      padding: 8px 1rem 8px 1.5rem;
      border-top-left-radius: 2rem;
      border-bottom-left-radius: 2rem; }
    .ui-footer.subscribe-footer .form-card .btn {
      padding: 0 1rem;
      line-height: 35px; }

/* 18.2 :: Contact Footer */
.ui-footer.contact-footer {
  padding-top: 6rem; }
  .ui-footer.contact-footer .form-card {
    margin: 0 0 2rem 0; }
    .ui-footer.contact-footer .form-card .heading {
      margin-bottom: 0; }
    .ui-footer.contact-footer .form-card.form-card-1 {
      margin: -14rem 0 2rem 0; }
    @media (min-width: 740px) {
      .ui-footer.contact-footer .form-card {
        margin: -14rem 0 2rem 0; } }
    .ui-footer.contact-footer .form-card .ui-icon-block {
      margin-bottom: 1rem; }

/* 18.3 :: Maps Footer */
.ui-footer.maps-footer, .ui-footer.contact-footer.maps-footer {
  margin-top: 0;
  padding-top: 0; }
  .ui-footer.maps-footer .ui-map, .ui-footer.contact-footer.maps-footer .ui-map {
    transform: translateZ(0px);
    height: 440px; }

/* 18.4 :: Waves Footer */
.ui-footer.ui-waves {
  margin-top: -2rem; }
  .ui-footer.ui-waves.subscribe-footer, .ui-footer.ui-waves.contact-footer {
    padding-top: 0; }
  .ui-footer.ui-waves .container {
    position: relative;
    z-index: 2; }
  .ui-footer.ui-waves .footer-bg {
    padding: 16rem 0 8rem 0; }
  .ui-footer.ui-waves::after {
    display: block;
    content: '';
    height: 100%;
    background: url("<?php echo  get_template_directory_uri();?>/images/svg-layers/waves2.svg") top no-repeat;
    background-size: contain;
    position: absolute;
    top: -5px;
    left: -1px;
    right: -1px;
    z-index: 1; }

/* 18.5 :: Mini Footer */
.ui-footer.mini-footer .footer-bg {
  padding: 2rem 0; }
.ui-footer.mini-footer .footer-logo img {
  height: 40px;
  width: auto; }
.ui-footer.mini-footer .footer-copyright {
  text-align: right; }

/* 19 :: HERO */
.ui-hero {
  position: relative; }
  .ui-hero.hero-sm {
    padding: 4rem 0; }
    @media (min-width: 992px) {
      .ui-hero.hero-sm {
        padding: 5rem 0; } }
    @media (min-width: 1367px) {
      .ui-hero.hero-sm {
        padding: 6rem 0; } }
  .ui-hero.hero-lg {
    padding: 2rem 0; }
    @media (min-width: 481px) {
      .ui-hero.hero-lg {
        padding: 2rem 0; } }
    @media (min-width: 740px) {
      .ui-hero.hero-lg {
        padding: 2rem 0; } }
    @media (min-width: 1367px) {
      .ui-hero.hero-lg {
        padding: 8rem 0; } }

    @media (max-width: 739px) {
      .ui-hero.hero-lg .heading, .ui-hero.hero-lg .paragraph {
        margin-left: auto;
        margin-right: auto;
        text-align: center; } }
    @media (min-width: 740px) {
       }
  .ui-hero .container {
    padding-top: 50px;
    position: relative;
    z-index: 2; }
    @media (min-width: 481px) {
      .ui-hero .container {
        padding-top: 60px; } }

  .ui-hero.hero-center {
    text-align: center; }
    .ui-hero.hero-center .heading, .ui-hero.hero-center .paragraph {
      margin-left: auto;
      margin-right: auto; }
  .ui-hero .heading {
    margin-bottom: 1.6rem;
    font-size: 2.6rem; }
    @media (min-width: 481px) {
      .ui-hero .heading {
        margin-bottom: 1.75rem;
        font-size: 3rem; } }
    @media (min-width: 740px) {
      .ui-hero .heading {
        margin-bottom: 2rem;
        font-size: 3.6rem;
		font-weight:500; } }
    @media (min-width: 992px) {
      .ui-hero .heading {
        margin-bottom: 2.25rem; } }
  .ui-hero .paragraph {
    margin-bottom: 0;
    font-size: 1.8rem; }
  .ui-hero .actions {
    margin-top: 1.6rem;
    text-align: center;
    margin-bottom: 3rem; }
    @media (min-width: 481px) {
      .ui-hero .actions {
        margin-top: 1.75rem; } }
    @media (min-width: 740px) {
      .ui-hero .actions {
        margin-top: 2rem;
        margin-bottom: 0;
        text-align: left; } }
    @media (min-width: 992px) {
      .ui-hero .actions {
        margin-top: 2.25rem; } }
  .ui-hero img {
    display: block; }
    @media (max-width: 739px) {
      .ui-hero img {
        margin-left: auto;
        margin-right: auto; } }

/* 19.1 Hero Slider */
.ui-hero.ui-hero-slider {
    padding: 5rem 0;
}
  @media (min-width: 481px) {
    .ui-hero.ui-hero-slider {
      padding: 9rem 0 ; } }
  @media (min-width: 740px) {
    .ui-hero.ui-hero-slider {
      padding: 7rem 0;
	  height:100vh; } }

  @media (min-width: 1349px) {
    .ui-hero.ui-hero-slider {
      padding: 9.3rem 0;
	  height:100vh; } }
	    @media (min-width: 1567px) {
    .ui-hero.ui-hero-slider {
      padding: 14rem 0; } }
	   @media (min-width: 1767px) {
    .ui-hero.ui-hero-slider {
      padding: 20rem 0; } }

  .ui-hero.ui-hero-slider .sp-slides {
    opacity: 1;
    -webkit-transition: opacity 0.35s ease-out;
    transition: opacity 0.35s ease-out; }
    .ui-hero.ui-hero-slider .sp-slides.fade {
      opacity: 0; }
  .ui-hero.ui-hero-slider .sp-buttons {
    bottom: 1rem; }
    @media (min-width: 740px) {
      .ui-hero.ui-hero-slider .sp-buttons {
        bottom: 1rem; } }
    @media (min-width: 1367px) {
      .ui-hero.ui-hero-slider .sp-buttons {
        bottom: 4rem; } }

/* 19.2 :: Waves Hero */
.ui-hero.ui-waves {
  margin: 0 0 -2rem 0;
  padding: 2rem 0 4rem 0; }
  @media (min-width: 740px) {
    .ui-hero.ui-waves {
      padding: 2rem 0 6rem 0; } }
  @media (min-width: 1367px) {
    .ui-hero.ui-waves {
      padding: 8rem 0 12rem 0; } }
  .ui-hero.ui-waves::after {
    display: block;
    content: '';
    height: 100%;
    background: url("<?php echo  get_template_directory_uri();?>/images/svg-layers/waves.svg") bottom no-repeat;
    background-size: contain;
    position: absolute;
    bottom: -1px;
    left: -20%;
    right: -20%;
    z-index: 1; }
    @media (min-width: 740px) {
      .ui-hero.ui-waves::after {
        left: -1px;
        right: -1px; } }

/* 19.3 Curved Hero*/
.ui-hero.ui-curve {
  padding: 2rem 0 4rem 0; }
  @media (min-width: 740px) {
    .ui-hero.ui-curve {
      padding: 2rem 0 6rem 0; } }
  @media (min-width: 1367px) {
    .ui-hero.ui-curve {
      padding: 8rem 0 12rem 0; } }
  .ui-hero.ui-curve::after {
    display: block;
    content: '';
    height: 100%;
    background: url("<?php echo  get_template_directory_uri();?>/images/svg-layers/curve-layer.svg") bottom no-repeat;
    background-size: contain;
    position: absolute;
    bottom: -3px;
    left: -1px;
    right: -1px;
    z-index: 1; }
    @media (min-width: 992px) {
      .ui-hero.ui-curve::after {
        left: -10%;
        right: -10%; } }
    @media (min-width: 1367px) {
      .ui-hero.ui-curve::after {
        left: -20%;
        right: -20%; } }
    @media (min-width: 1500px) {
      .ui-hero.ui-curve::after {
        left: -30%;
        right: -30%; } }

/* 19.4 Tilt Hero */
.ui-hero.ui-tilt {
  margin: 0 0 -8rem 0;
  padding: 2rem 0 4rem 0; }
  @media (min-width: 740px) {
    .ui-hero.ui-tilt {
      padding: 2rem 0 6rem 0; } }
  @media (min-width: 1367px) {
    .ui-hero.ui-tilt {
      padding: 8rem 0 16rem 0; } }
  .ui-hero.ui-tilt::after {
    display: block;
    content: '';
    position: absolute;
    left: -8rem;
    right: -8rem;
    height: 16rem;
    background-color: #FFF;
    -webkit-transform: rotate(-10deg);
    transform: rotate(-10deg);
    z-index: 1; }
    @media (min-width: 740px) {
      .ui-hero.ui-tilt::after {
        -webkit-transform: rotate(-8.5deg);
        transform: rotate(-8.5deg); } }
    @media (min-width: 992px) {
      .ui-hero.ui-tilt::after {
        -webkit-transform: rotate(-5.5deg);
        transform: rotate(-5.5deg); } }
  .ui-hero.ui-tilt::after {
    bottom: -8rem; }

/* 19.5 Hero Gradient Animator */
.ui-hero.ui-gradient-animator {
  background: linear-gradient(45deg, #fd81b5, #c961f7, #8089ff, #c961f7, #fe60a1, #ff8765, #fe60a1, #8089ff, #54ceff);
  background-size: 450% 100%;
  -webkit-animation-name: animate_gradient;
  animation-name: animate_gradient;
  -webkit-animation-duration: 35s;
  animation-duration: 35s;
  -webkit-animation-timing-function: linear;
  animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
  animation-iteration-count: infinite; }

/* 20 :: ICON BLOCKS */
.ui-icon-blocks .ui-icon-block {
  position: relative;
  margin-bottom: 7rem; }
  .ui-icon-blocks .ui-icon-block:last-child {
  position: relative;
  margin-bottom: 2rem; }
  .ui-icon-blocks .ui-icon-block p {
    display: inline-block;
    max-width: 360px;
    margin-bottom: 0; }
  @media (min-width: 740px) {
    .ui-icon-blocks .ui-icon-block.mb-0-md-up {
      margin-bottom: 0; } }
  @media (min-width: 739px) {
    .ui-icon-blocks .ui-icon-block.mb-0-md-dwn {
      margin-bottom: 0; } }
  .ui-icon-blocks .ui-icon-block.col-xs-6 p {
    max-width: 260px; }
    @media (min-width: 740px) {
      .ui-icon-blocks .ui-icon-block.col-xs-6 p {
        max-width: 360px; } }
.ui-icon-blocks .icon {
  font-size: 2rem;
  color: #8089ff; }
  .ui-icon-blocks .icon.icon-circle {
    width: 4.8rem;
    height: 4.8rem;
    line-height: 4.8rem;
    border-radius: 100%;
    background-color: #FFF;
    box-shadow: 0 7px 15px rgba(0, 9, 128, 0.05), 0 12px 28px rgba(0, 9, 128, 0.075); }
    @media (min-width: 481px) {
      .ui-icon-blocks .icon.icon-circle {
        width: 5rem;
        height: 5rem;
        line-height: 5rem; } }
    @media (min-width: 740px) {
      .ui-icon-blocks .icon.icon-circle {
        width: 5.2rem;
        height: 5.2rem;
        line-height: 5.2rem; } }
.ui-icon-blocks.ui-blocks-h {
  text-align: center; }
  .ui-icon-blocks.ui-blocks-h .icon {
    display: inline-block;
    margin-bottom: 1.25rem; }
.ui-icon-blocks.ui-blocks-v {
  list-style: none;
  padding-left: 2rem; }
  .ui-icon-blocks.ui-blocks-v .icon {
    position: absolute;
    left: -2rem;
    top: .25rem; }
.ui-icon-blocks.icons-md .icon {
  font-size: 2rem; }
  @media (min-width: 481px) {
    .ui-icon-blocks.icons-md .icon {
      font-size: 2.1rem; } }
  @media (min-width: 740px) {
    .ui-icon-blocks.icons-md .icon {
      font-size: 2.2rem; } }
.ui-icon-blocks.icons-md.ui-blocks-v {
  padding-left: 4rem; }
  .ui-icon-blocks.icons-md.ui-blocks-v .icon {
    left: -4rem;
    top: .5rem; }
.ui-icon-blocks.icons-lg .icon {
  font-size: 2.3rem; }
  @media (min-width: 481px) {
    .ui-icon-blocks.icons-lg .icon {
      font-size: 2rem; } }
  @media (min-width: 740px) {
    .ui-icon-blocks.icons-lg .icon {
      font-size: 2rem; } }
.ui-icon-blocks.icons-lg.ui-blocks-v {
  padding-left: 5rem; }
  .ui-icon-blocks.icons-lg.ui-blocks-v .icon {
    left: -5rem;
    top:  -0.5rem;}

/* 21 :: MODAL */
.modal {
  display: none;
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 9999;
  padding: 1rem;
  background-color: rgba(36, 42, 50, 0.75); }
  @media (min-width: 740px) {
    .modal {
      padding: 0; } }
  .modal .dialog {
    position: relative;
    padding-left: 0;
    padding-right: 0;
    border-radius: 0.5rem;
    box-shadow: 0 7px 15px rgba(0, 9, 128, 0.05), 0 12px 28px rgba(0, 9, 128, 0.075); }
    @media (min-width: 740px) {
      .modal .dialog {
        margin-top: 6rem; } }
  .modal .close {
    cursor: pointer;
    position: absolute;
    top: .5rem;
    right: 1rem;
    z-index: 9;
    opacity: 0.75;
    font-size: 1.4rem; }
    .modal .close:hover {
      opacity: 1;
      -webkit-transition: opacity 0.25s;
      transition: opacity 0.25s; }

body.modal-open {
  overflow: hidden; }

/* 22 :: NAVBAR */
.navbar {
  font-family:  'Nunito', sans-serif;
  box-shadow: 0 5px 10px rgba(0, 9, 128, 0.035), 0 7px 18px rgba(0, 9, 128, 0.05);
  -webkit-transition: box-shadow 0.35s ease-out, background-color 0.35s ease-out;
  transition: box-shadow 0.35s ease-out, background-color 0.35s ease-out; }
  @media (max-width: 481px) {
	  .ui-hero .container {
    padding-top: 11px !important;
    position: relative;
    z-index: 2;
}
    .navbar {
      min-height: 50px; } }
  .navbar .navbar-brand {
    position: relative;
    font-size: 1.4rem; }
    .navbar .navbar-brand img {
      height: 30px;
      width: auto;
      position: absolute;
      top: 50%;
      left: 0;
      margin-top: -15px;
      -webkit-transition: opacity 0.35s ease-out;
      transition: opacity 0.35s ease-out; }
      @media (min-width: 481px) {
        .navbar .navbar-brand img {
          height: 36px;
          margin-top: -18px; } }
      @media (min-width: 740px) {
        .navbar .navbar-brand img {
          height: 50px;
          margin-top: -20px;
          left: 1rem; }
		  .iimk img {
          height: 110px !important;
        margin-top: -32px !important;
          left: 1rem;}}
    @media (max-width: 481px) {
      .navbar .navbar-brand {
        height: 50px; } }
  .navbar a {
    font-size: .95rem;
    font-weight: 600; }
    @media (min-width: 740px) {
      .navbar a {
        font-size: 1rem; } }
  .navbar .nav > li > a {
    padding-left: 10px;
    padding-right: 10px; }
    @media (min-width: 992px) {
      .navbar .nav > li > a {
        padding-left: 16px;
        padding-right: 16px; } }
  .navbar .dropdown-menu {
    background-color: transparent; }
    @media (min-width: 740px) {
      .navbar .dropdown-menu {
        background-color: #FFF;
        box-shadow: 0 7px 15px rgba(0, 9, 128, 0.05), 0 12px 28px rgba(0, 9, 128, 0.075); } }
    .navbar .dropdown-menu a {
      font-size: .9rem; }
  .navbar .btn {
    -webkit-transition: background 0.35s ease-out;
    transition: background 0.35s ease-out;
    padding: .4rem 1rem;
    margin: 9px 0 9px 1rem;
    color: #FFF; }
    @media (min-width: 481px) {
      .navbar .btn {
        margin: 13px 0 13px 1.25rem; } }
		 @media (max-width: 740px) {
		.iimk img {
    height: 70px !important;
    margin-top: -19px !important;
    left: 1rem;
}
		 }
    @media (min-width: 740px) {
      .navbar .btn {
        margin: 13px 0 13px 1.5rem; } }

/* 22.1 :: Transparent Navbar */
.navbar.transparent, .navbar.transparent.navbar-inverse, .navbar.transparent.navbar-default, .navbar.transparent.bg-primary {
  background-color: transparent;
  box-shadow: none; }
  .navbar.transparent .navbar-brand, .navbar.transparent.navbar-inverse .navbar-brand, .navbar.transparent.navbar-default .navbar-brand, .navbar.transparent.bg-primary .navbar-brand {
    color: #FFF; }
  .navbar.transparent .navbar-nav > li > a, .navbar.transparent.navbar-inverse .navbar-nav > li > a, .navbar.transparent.navbar-default .navbar-nav > li > a, .navbar.transparent.bg-primary .navbar-nav > li > a {
    color: rgba(255, 255, 255, 0.85); }
    .navbar.transparent .navbar-nav > li > a:hover, .navbar.transparent.navbar-inverse .navbar-nav > li > a:hover, .navbar.transparent.navbar-default .navbar-nav > li > a:hover, .navbar.transparent.bg-primary .navbar-nav > li > a:hover {
      color: #FFF; }
  .navbar.transparent .navbar-nav > li.active > a, .navbar.transparent.navbar-inverse .navbar-nav > li.active > a, .navbar.transparent.navbar-default .navbar-nav > li.active > a, .navbar.transparent.bg-primary .navbar-nav > li.active > a {
    color: #FFF; }
  .navbar.transparent .btn, .navbar.transparent.navbar-inverse .btn, .navbar.transparent.navbar-default .btn, .navbar.transparent.bg-primary .btn {
    background: #FFF;
    color: #8089ff; }

/* 22.2 :: Variable Logos */
.navbar .ui-variable-logo .logo-default {
  opacity: 1; }
.navbar .ui-variable-logo .logo-transparent {
  opacity: 0; }
.navbar.transparent .ui-variable-logo .logo-default {
  opacity: 0; }
.navbar.transparent .ui-variable-logo .logo-transparent {
  opacity: 1; }
.navbar{
		width:100%;}
/* 22.3 :: Mobile Nav */
@media (max-width: 739px) {
	.right-logo img{
	width: 160px;
margin-top: 25px;}
	.navbar{
		width:100%;}
  .ui-navigation {
  margin-right: 2%;
padding-top: 0rem;
padding-bottom: 1.25rem;
border-top: 1px solid rgba(0, 0, 0, 0.05);
width: auto;
float: right; } }

.mobile-nav-active .navbar-nav .dropdown-menu {
  padding: 0 0 .75rem 0; }
.mobile-nav-active .navbar-nav.nav > li > a:hover {
  background-color: #f6f7f8; }

/* 22.4 :: Mobile Nav Toggle */
.ui-mobile-nav-toggle {
  margin-left: 1rem; }
  @media (min-width: 481px) {
    .ui-mobile-nav-toggle {
      margin-left: 2rem; } }
  @media (min-width: 740px) {
    .ui-mobile-nav-toggle {
      display: none; } }
  .ui-mobile-nav-toggle > div {
    position: relative;
    width: 24px;
    height: 16px;
    margin: 22px 0; }
    .ui-mobile-nav-toggle > div > span {
      display: block;
      position: absolute;
      height: 3px;
      width: 100%;
      background-color: #414c5a;
      border-radius: 4px;
      left: 0;
      -webkit-transform: rotate(0deg);
      transform: rotate(0deg);
      -webkit-transition: 0.25s ease-out;
      transition: 0.25s ease-out; }
    .ui-mobile-nav-toggle > div > span:nth-child(1) {
      top: 0px; }
    .ui-mobile-nav-toggle > div > span:nth-child(2), .ui-mobile-nav-toggle > div > span:nth-child(3) {
      top: 5.83333px; }
    .ui-mobile-nav-toggle > div > span:nth-child(4) {
      top: 11.66667px; }
    @media (max-width: 481px) {
      .ui-mobile-nav-toggle > div {
        margin: 17px 0; } }
  .ui-mobile-nav-toggle.active > div > span:nth-child(1) {
    top: 10px;
    width: 0%;
    left: 50%; }
  .ui-mobile-nav-toggle.active > div > span:nth-child(2) {
    -webkit-transform: rotate(45deg);
    transform: rotate(45deg); }
  .ui-mobile-nav-toggle.active > div > span:nth-child(3) {
    -webkit-transform: rotate(-45deg);
    transform: rotate(-45deg); }
  .ui-mobile-nav-toggle.active > div > span:nth-child(4) {
    top: 10px;
    width: 0%;
    left: 50%; }

.transparent .ui-mobile-nav-toggle > div > span, .navbar-inverse .ui-mobile-nav-toggle > div > span {
  background-color: #FFF; }

/* 23 :: SECTIONS */
.section {
  position: relative;
  padding: 4rem 0;
  z-index: 1; }

@media (max-width: 991px) {
	.form {
		position:relative !important;}
		.actions a{display:none;

			}
			.sp-slides-container {

    position: absolute;
    top: 20%;
}
			.ui-hero.ui-hero-slider{
				height:100vh;}
				.form-group {
					height:auto !important;}
					.form1 {
						position:relative !important;
						top:0 !important }
						.form1 .col-sm-3{
							margin:10px 0;}

   }
@media (min-width: 992px) {
  .section.ui-showcase-section div[class^="col-"]:nth-child(2), .section.ui-showcase-section div[class*=" col-"]:nth-child(2) {
    padding-left: 2rem; } }
@media (min-width: 1200px) {
  .section.ui-showcase-section div[class^="col-"]:nth-child(2), .section.ui-showcase-section div[class*=" col-"]:nth-child(2) {
    padding-left: 0; } }

/* 23.1 :: Section Heading */
.section .section-heading {
  margin-bottom: 2rem; }
  .section .section-heading .icon {
    display: inline-block;
    font-size: 3.6rem;
    margin-bottom: 2rem; }
  .section .section-heading .heading {
    margin-top: 0;
    margin-bottom: 1rem; }
  .section .section-heading .paragraph {
    display: inline-block;

    font-size: 1.1rem;
    margin-bottom: 1rem; }
  .section .section-heading.center {
    text-align: center; }
    .section .section-heading.center .paragraph {
      margin: 0 auto; }
  @media (min-width: 481px) {
    .section .section-heading .heading, .section .section-heading .paragraph {
      margin-bottom: 1.25rem; } }
  @media (min-width: 740px) {
    .section .section-heading .heading, .section .section-heading .paragraph {
      margin-bottom: 1.5rem; } }
  @media (min-width: 992px) {
    .section .section-heading .heading, .section .section-heading .paragraph {
      margin-bottom: 1.75rem; } }

/* 23.1 :: Background Image With Overlay */
.section.bg-overlay {
  background-position: center center;
  background-size: cover; }
  .section.bg-overlay .container {
    position: relative;
    z-index: 2; }
  .section.bg-overlay::before {
    display: block;
    content: '';
    opacity: 0.8;
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    width: 100%;
    z-index: 1; }

/* 23.2 :: Section Waves */
.section.waves-layer .container {
  position: relative;
  z-index: 2; }
.section.waves-layer::after {
  display: block;
  content: '';
  position: absolute;
  bottom: -1px;
  left: -25%;
  right: -25%;
  height: 100%;
  background: url("<?php echo  get_template_directory_uri();?>/images/svg-layers/waves-layer-a.svg.html") bottom no-repeat;
  background-size: contain;
  opacity: 0.75;
  z-index: 1; }
  @media (min-width: 740px) {
    .section.waves-layer::after {
      left: -15%;
      right: -15%; } }
  @media (min-width: 992px) {
    .section.waves-layer::after {
      left: -12%;
      right: -12%; } }
  @media (min-width: 1367px) {
    .section.waves-layer::after {
      left: -9%;
      right: -9%; } }

/* 23.3 :: Section Tilt */
.ui-action-section.ui-section-tilt {
  margin: -4rem 0;
  padding: 16rem 0;
  z-index: 0; }
  .ui-action-section.ui-section-tilt::before, .ui-action-section.ui-section-tilt::after {
    display: block;
    content: '';
    position: absolute;
    left: -8rem;
    right: -8rem;
    height: 16rem;
    background-color: #FFF;
    -webkit-transform: rotate(-10deg);
    transform: rotate(-10deg);
    z-index: -1; }
    @media (min-width: 740px) {
      .ui-action-section.ui-section-tilt::before, .ui-action-section.ui-section-tilt::after {
        -webkit-transform: rotate(-8.5deg);
        transform: rotate(-8.5deg); } }
    @media (min-width: 992px) {
      .ui-action-section.ui-section-tilt::before, .ui-action-section.ui-section-tilt::after {
        -webkit-transform: rotate(-5.5deg);
        transform: rotate(-5.5deg); } }
  .ui-action-section.ui-section-tilt::before {
    top: -8rem; }
  .ui-action-section.ui-section-tilt::after {
    bottom: -8rem; }
  @media (max-width: 739px) {
    .ui-action-section.ui-section-tilt {
      margin: -8rem 0; } }
  @media (min-width: 740px) {
    .ui-action-section.ui-section-tilt .text-block {
      display: inline-block;
      margin-top: 5rem; } }

/* 23.4 :: Call To Action Section */
@media (max-width: 739px) {
  .ui-action-section .text-block {
    text-align: center; } }
.ui-action-section .section-heading {
  margin-bottom: 0; }
.ui-action-section .img-block {
  text-align: center; }
  .ui-action-section .img-block img {
    position: relative;
    margin-top: 4rem;
    z-index: 2; }
    @media (min-width: 740px) {
      .ui-action-section .img-block img {
        display: inline-block;
        margin-top: -6rem;
        margin-bottom: -12rem; } }

/* 24 :: TABS */
.ui-tabs .nav-tabs {
  font-family:  'Nunito', sans-serif;
  margin-bottom: 2rem; }
  .ui-tabs .nav-tabs li {
    border-radius: 0.25rem;
    -webkit-transition: background-color 0.35s ease-out, box-shadow 0.35s ease-out;
    transition: background-color 0.35s ease-out, box-shadow 0.35s ease-out;
    margin-right: .25rem; }
    .ui-tabs .nav-tabs li:nth-last-child(1) {
      margin-right: 0; }
    .ui-tabs .nav-tabs li.active {
      background-color: #8089ff;
      box-shadow: 0 5px 10px rgba(0, 9, 128, 0.035), 0 7px 18px rgba(0, 9, 128, 0.05); }
      .ui-tabs .nav-tabs li.active a {
        color: #fff; }
    .ui-tabs .nav-tabs li a {
      color: #59687c;
      font-weight: 700;
      text-transform: uppercase; }
.ui-tabs .tab-pane {
  padding-top: 1rem; }
  .ui-tabs .tab-pane .sub-heading {
    font-weight: 600;
    margin-bottom: 2rem; }

/* 25 :: VIDEO */
.video-player {
  position: relative;
  padding-bottom: 56.245%;
  height: 0;
  border-radius: 0.5rem;
  background-color: #242a32; }
  .video-player iframe {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 1; }

/* 25.1 :: Video Toggle */
.ui-video-toggle {
  display: inline-block;
  height: 52px;
  width: 52px;
  border-radius: 100%;
  border: 2px solid #FFF;
  text-align: center;
  color: #FFF;
  margin-bottom: 2rem;
  cursor: pointer;
  -webkit-transition: border-color 0.25s ease-out, color 0.25s ease-out;
  transition: border-color 0.25s ease-out, color 0.25s ease-out; }
  .ui-video-toggle:hover {
    color: #84ce65;
    border-color: #84ce65; }

.section .section-heading .ui-video-toggle .icon, .ui-video-toggle .icon {
  font-size: 26px;
  line-height: 50px;
  margin-bottom: 0;
  margin-right: -3px; }

/* 25.2 :: Video Modal */
.video-modal .dialog {
  overflow: hidden; }
.video-modal .close {
  color: #FFF; }

/* 26 :: ACCORDION SHOWCASE */
@media (max-width: 739px) {
  .ui-accordion-showcase > div:nth-child(1) {
    margin-bottom: 4rem; }
	.mob{
		display:block !important;}
		.desk{
			display:none !important}}
@media (min-width: 740px) {
	.mob{
		display:none !important;}
		.desk{
			display:block !important}
  .ui-accordion-showcase > div {
    float: right; } }

/* UI App Screens */
.ui-app-screens .owl-stage-outer {
  padding: 1rem 0 2rem 0; }
.ui-app-screens .ui-card {
  width: 275px;
  overflow: hidden;
  border-radius: 1.25rem; }
.ui-app-screens .owl-item .ui-card {
  opacity: 0.75;
  -webkit-transform: scale(0.85);
  transform: scale(0.85);
  -webkit-transition: transform 0.35s ease-out, box-shadow 0.35s ease-out, opacity 0.35s ease-out;
  transition: transform 0.35s ease-out, box-shadow 0.35s ease-out, opacity 0.35s ease-out; }
.ui-app-screens .owl-item.center .ui-card {
  opacity: 1;
  box-shadow: 0 7px 15px rgba(0, 9, 128, 0.05), 0 12px 28px rgba(0, 9, 128, 0.075);
  -webkit-transform: scale(1);
  transform: scale(1); }

/* 28 ::  APP SHOWCASE */
@media (max-width: 739px) {
  .ui-app-showcase .ui-icon-blocks.icons-md .ui-icon-block, .ui-app-showcase .ui-icon-blocks.icons-lg .ui-icon-block {
    margin-bottom: 2rem; }
  .ui-app-showcase [data-col="text_a"] .ui-icon-blocks.icons-md, .ui-app-showcase [data-col="text_a"] .ui-icon-blocks.icons-lg {
    margin-bottom: 0; } }

/* Image Block
 * Keep Image True Width
 * And Move Off Canvas */
@media (max-width: 739px) {
  .ui-app-showcase [data-col="img"] img {
    display: block;
    float: right;
    min-width: 275px; } }

/* 29 :: APP STATS */
.ui-stats .stat {
  margin-bottom: 0; }
.ui-stats .ui-icon-block {
  margin-bottom: 0; }
  @media (max-width: 739px) {
    .ui-stats .ui-icon-block:nth-child(1), .ui-stats .ui-icon-block:nth-child(2) {
      margin-bottom: 2rem; } }

/* 30 :: BLOG */
.ui-blog {
  padding: 4rem 0; }
  .ui-blog .blog-section {
    margin-bottom: 4rem; }
    .ui-blog .blog-section .section-label {
      color: #8e9bae;
      font-size: .9rem;
      text-transform: uppercase; }
  .ui-blog .blog-sidebar:before, .ui-blog .blog-sidebar:after {
    content: " ";
    display: table; }
  .ui-blog .blog-sidebar:after {
    clear: both; }
  @media (min-width: 740px) {
    .ui-blog {
      display: table;
      width: 100%; }
      .ui-blog .blog-body, .ui-blog .blog-sidebar {
        display: table-cell; }
      .ui-blog .blog-sidebar {
        padding-left: 4rem;
        width: 280px;
        vertical-align: top; } }
  @media (min-width: 992px) {
    .ui-blog {
      padding: 5rem 0; }
      .ui-blog .blog-sidebar {
        padding-left: 5rem;
        width: 350px; } }
  @media (min-width: 1367px) {
    .ui-blog {
      padding: 6rem 0; }
      .ui-blog .blog-sidebar {
        padding-left: 6rem;
        width: 400px; } }

/* 30.1 :: Blog Grid */
.ui-blog-grid .post-item {
	webkit-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
-ms-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
-o-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
  margin-bottom: 2rem; }
  .ui-blog-grid .post-item .card-image {
    height: 180px; }
    @media (min-width: 481px) {
      .ui-blog-grid .post-item .card-image {
        height: 200px; } }
    @media (min-width: 740px) {
      .ui-blog-grid .post-item .card-image {
        height: 232px; } }
    .ui-blog-grid .post-item .card-image .ui-cover-img {
      max-width: none; }
  .ui-blog-grid .post-item .card-body {
    height: 6.8rem; }

/* 30.2 :: Blog List */
.ui-blog-list .post-item {
  border-bottom: 1px solid #d8dde3;
  padding-bottom: 1.5rem;
  margin-bottom: 4rem; }
  .ui-blog-list .post-item .heading {
    margin-bottom: .35rem; }
  .ui-blog-list .post-item .post-date {
    margin-bottom: 1.5rem; }
  .ui-blog-list .post-item .post-meta {
    margin-bottom: 1rem; }
    @media (max-width: 413px) {
      .ui-blog-list .post-item .post-meta div[class^="col-"], .ui-blog-list .post-item .post-meta div[class*=" col-"] {
        width: 100%;
        float: none; } }
    .ui-blog-list .post-item .post-meta .row > div:nth-last-child(1) {
      height: 40px;
      text-align: right;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap; }
      .ui-blog-list .post-item .post-meta .row > div:nth-last-child(1) > div {
        display: inline-block;
        height: 40px;
        line-height: 40px;
        font-size: .95rem;
        text-align: left; }
      @media (max-width: 413px) {
        .ui-blog-list .post-item .post-meta .row > div:nth-last-child(1) {
          display: none; } }
    .ui-blog-list .post-item .post-meta .post-author {
      height: 40px;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap; }
      .ui-blog-list .post-item .post-meta .post-author span {
        display: inline-block;
        vertical-align: middle; }
      .ui-blog-list .post-item .post-meta .post-author .avatar {
        width: 40px;
        height: 40px;
        border-radius: 100%;
        overflow: hidden; }
        .ui-blog-list .post-item .post-meta .post-author .avatar img {
          width: 40px;
          height: 40px; }
        @media (max-width: 413px) {
          .ui-blog-list .post-item .post-meta .post-author .avatar {
            width: 32px;
            height: 32px; }
            .ui-blog-list .post-item .post-meta .post-author .avatar img {
              width: 32px;
              height: 32px; } }
      @media (max-width: 413px) {
        .ui-blog-list .post-item .post-meta .post-author {
          height: 32px; } }
    .ui-blog-list .post-item .post-meta .icon {
      padding-right: .5rem;
      color: #8089ff;
      font-size: 1.25rem;
      vertical-align: middle; }
  .ui-blog-list .post-item .post-body {
    padding: 1.8rem 2rem 2rem 2rem; }
  .ui-blog-list .post-item .post-text {
    margin-bottom: 1.5rem; }
    .ui-blog-list .post-item .post-text p {
      margin-bottom: 0; }
    .ui-blog-list .post-item .post-text .ui-turncate-text {
      height: 4.2rem; }
  .ui-blog-list .post-item .post-footer .row > div:nth-last-child(1) {
    height: 40px;
    text-align: right; }
    .ui-blog-list .post-item .post-footer .row > div:nth-last-child(1) > div {
      display: inline-block;
      height: 40px;
      margin-right: .5rem;
      line-height: 40px;
      text-align: left; }
      .ui-blog-list .post-item .post-footer .row > div:nth-last-child(1) > div:nth-last-child(1) {
        margin-right: 0; }
.ui-blog-list .post-image {
  height: 280px; }
  @media (min-width: 481px) {
    .ui-blog-list .post-image {
      height: 300px; } }
  @media (min-width: 740px) {
    .ui-blog-list .post-image {
      height: 340px; } }

/* 30.3 :: Post Item Card */
.ui-card.post-item .card-header {
  padding: 0.3rem 1.5rem 0 1.5rem; }
  .ui-card.post-item .card-header .heading {
    margin-bottom: 0.25rem; }
  .ui-card.post-item .card-header small {
    font-size: .9rem; }
.ui-card.post-item .card-body {
  padding: 0.3rem 1.5rem 1rem 1.5rem; }
  .ui-card.post-item .card-body p {
    margin-bottom: 10px; }
.ui-card.post-item .card-footer {
  padding: 0 1.5rem 1.5rem 1.5rem; }
  .ui-card.post-item .card-footer .post-meta {
    font-size: .9rem; }
    .ui-card.post-item .card-footer .post-meta .row > div:nth-last-child(1) {
      height: 26px;
      text-align: right; }
      .ui-card.post-item .card-footer .post-meta .row > div:nth-last-child(1) > div {
        display: inline-block;
        vertical-align: middle;
        text-align: left; }
  .ui-card.post-item .card-footer .post-author {
    height: 26px; }
    .ui-card.post-item .card-footer .post-author span {
      display: inline-block;
      vertical-align: middle; }
    .ui-card.post-item .card-footer .post-author .avatar {
      width: 26px;
      height: 26px;
      border-radius: 100%;
      overflow: hidden;
      margin-right: .25rem; }
      .ui-card.post-item .card-footer .post-author .avatar img {
        width: 26px;
        height: 26px; }

/* 30.4 :: Post Item Image */
.post-image {
  background-size: cover;
  background-position: center center;
  border-radius: 0.5rem;
  overflow: hidden; }
  .post-image img {
    display: block;
    width: 100%;
    max-width: 100%;
    height: auto; }

/* 30.5 :: Single Blog Post */
.ui-blog-post .heading {
  margin-bottom: 1.5rem; }
.ui-blog-post .post-image {
  margin-bottom: 2rem; }
.ui-blog-post .post-footer {
  padding-bottom: 4rem;
  border-bottom: 1px solid #d8dde3;
  margin-bottom: 4rem;
  margin-top: 2rem; }
  .ui-blog-post .post-footer .heading {
    text-transform: uppercase;
    margin-bottom: 1rem; }
    .ui-blog-post .post-footer .heading small {
      font-weight: 600; }
  .ui-blog-post .post-footer .post-tags {
    margin-top: 2rem; }
    @media (min-width: 481px) {
      .ui-blog-post .post-footer .post-tags {
        margin-top: 0;
        text-align: right; } }

/* 30.6 :: Blog Post Hero */
.ui-hero.ui-post-hero {
  padding: 6rem 0 0 0; }
  .ui-hero.ui-post-hero .post-meta {
    padding: 4rem 0 2rem 0; }
    .ui-hero.ui-post-hero .post-meta:before, .ui-hero.ui-post-hero .post-meta:after {
      content: " ";
      display: table; }
    .ui-hero.ui-post-hero .post-meta:after {
      clear: both; }
    .ui-hero.ui-post-hero .post-meta > div {
      display: block;
      float: left;
      height: 22px;
      margin-right: 1.5rem;
      color: #FFF;
      font-weight: 500;
      font-size: .9rem; }
      .ui-hero.ui-post-hero .post-meta > div span, .ui-hero.ui-post-hero .post-meta > div span .icon {
        display: inline-block;
        line-height: 22px;
        vertical-align: middle; }
      .ui-hero.ui-post-hero .post-meta > div a {
        color: #FFF;
        position: relative; }
        .ui-hero.ui-post-hero .post-meta > div a::after {
          content: '';
          position: absolute;
          bottom: -1px;
          left: 0;
          right: 0;
          height: 2px;
          border-bottom: 2px dotted rgba(255, 255, 255, 0.5); }
      .ui-hero.ui-post-hero .post-meta > div .icon {
        color: #FFF;
        font-size: 1.05rem;
        margin-right: .25rem; }

/* 30.7 :: Blog Post Comments */
.comment-reply {
  padding-left: 3rem; }

.comment {
  position: relative;
  padding-bottom: 2rem;
  margin-bottom: 2rem; }
  .comment.border {
    border-bottom: 1px solid #d8dde3; }
  .comment .date-posted {
    position: absolute;
    top: 0;
    right: 0; }
  .comment .text {
    padding-left: 80px; }
    .comment .text .heading {
      margin-bottom: .5rem; }
    .comment .text p {
      margin-bottom: .5rem; }
  .comment .avatar {
    position: absolute;
    top: 0;
    left: 0;
    width: 60px; }
  .comment .comment-actions a {
    display: inline-block;
    color: #8e9bae;
    margin-right: .5rem;
    font-size: .8rem; }
    .comment .comment-actions a:hover {
      color: #8089ff; }
  .comment .comment-meta li {
    display: inline-block;
    margin-right: .75rem;
    font-weight: 400;
    font-size: .75rem;
    color: #708198; }
    .comment .comment-meta li a {
      font-weight: 400;
      color: #414c5a; }
    .comment .comment-meta li .icon {
      color: #414c5a; }

.ui-comment-form a {
  border: none;
  font-size: 1.1rem; }

/* 30.8 :: Post Author Card */
.ui-author-card {
  padding: 1rem; }
  @media (min-width: 740px) {
    .ui-author-card {
      padding: 1.5rem; } }
  @media (min-width: 992px) {
    .ui-author-card {
      padding: 2rem; } }
  .ui-author-card .inner {
    display: table;
    width: 100%; }
  .ui-author-card .block {
    display: table-cell; }
    .ui-author-card .block:nth-child(1) {
      width: 110px;
      text-align: center;
      vertical-align: middle; }
      @media (min-width: 740px) {
        .ui-author-card .block:nth-child(1) {
          width: 120px; } }
      @media (min-width: 992px) {
        .ui-author-card .block:nth-child(1) {
          width: 130px; } }
    .ui-author-card .block:nth-last-child(1) {
      padding-left: 1rem;
      vertical-align: top; }
      @media (min-width: 740px) {
        .ui-author-card .block:nth-last-child(1) {
          padding-left: 1.5rem; } }
      @media (min-width: 992px) {
        .ui-author-card .block:nth-last-child(1) {
          padding-left: 2rem; } }
  .ui-author-card .avatar {
    width: 60px;
    margin: 0 auto 1rem auto;
    border-radius: 100%;
    overflow: hidden; }
    .ui-author-card .avatar img {
      max-width: 100%;
      width: 100%;
      height: auto; }
    @media (min-width: 740px) {
      .ui-author-card .avatar {
        width: 70px; } }
    @media (min-width: 992px) {
      .ui-author-card .avatar {
        width: 80px; } }
  .ui-author-card .heading {
    margin-bottom: .25rem; }
  .ui-author-card .sub-heading {
    font-size: .9rem; }
  .ui-author-card .paragraph {
    margin-bottom: 0; }
  .ui-author-card .social-links a {
    color: #FFF;
    margin-right: .35rem;
    font-size: 1.1rem; }
    .ui-author-card .social-links a:nth-last-child(1) {
      margin-right: 0; }

/* 30.9 :: Blog Sidebar Widgets */
.ui-widget {
  padding-bottom: 2rem;
  margin-bottom: 2rem;
  border-bottom: 1px solid #e7eaee; }
  .ui-widget .ui-widget-title {
    font-size: .9rem;
    text-transform: uppercase;
    color: #8e9bae; }

.ui-basic-widget .image {
  border-radius: 0.5rem;
  overflow: hidden; }
  .ui-basic-widget .image img {
    display: block;
    width: 100%;
    max-width: 100%;
    height: auto; }
.ui-basic-widget .heading {
  margin-top: 1rem;
  margin-bottom: .75rem;
  font-size: 1rem; }
.ui-basic-widget .paragraph {
  font-size: .9rem; }

.ui-posts-widget .post-item {
  display: block;
  position: relative;
  padding-left: 66px;
  height: 66px;
  color: #708198; }
  .ui-posts-widget .post-item:hover, .ui-posts-widget .post-item:hover .heading {
    color: #8089ff; }
.ui-posts-widget .post-image {
  position: absolute;
  top: 50%;
  left: 0;
  width: 50px;
  height: 50px;
  margin-top: -25px;
  text-align: center; }
  .ui-posts-widget .post-image img {
    display: inline-block;
    width: 5rem;
    max-width: 5rem;
    height: auto; }
.ui-posts-widget .post-body {
  display: table;
  height: 100%;
  width: 100%; }
  .ui-posts-widget .post-body > .inner {
    display: table-cell;
    vertical-align: middle; }
  .ui-posts-widget .post-body .heading, .ui-posts-widget .post-body p {
    text-overflow: ellipsis;
    white-space: nowrap;
    overflow: hidden; }
  .ui-posts-widget .post-body .heading {
    margin-top: 0;
    margin-bottom: .25rem;
    font-size: 1rem; }
  .ui-posts-widget .post-body p {
    margin-bottom: 0;
    font-size: .9rem; }

.ui-instagram-widget:before, .ui-instagram-widget:after {
  content: " ";
  display: table; }
.ui-instagram-widget:after {
  clear: both; }
.ui-instagram-widget a {
  display: block;
  width: 33.33333%;
  float: left;
  margin-bottom: 1rem; }
.ui-instagram-widget img {
  max-width: 100%;
  width: 100%;
  height: auto; }

@media (max-width: 739px) {
  .ui-instagram-widget,
  .ui-tags-widget {
    width: 48%; } }
@media (max-width: 413px) {
  .ui-instagram-widget,
  .ui-tags-widget {
    width: 100%;
    float: none;
    padding-left: 0;
    padding-right: 0; } }

@media (max-width: 739px) {
  .ui-instagram-widget {
    float: right; } }

@media (max-width: 739px) {
  .ui-tags-widget {
    float: left; } }

/* 30.10 :: Blog Tags */
.tag {
  display: inline-block;
  padding: .2rem .75rem;
  border-radius: 0.5rem;
  margin-bottom: .5rem;
  margin-right: .25rem;
  font-size: .9rem;
  border: 1px solid #d8dde3;
  -webkit-transition: color 0.25s ease-out, background-color 0.25s ease-out;
  transition: color 0.25s ease-out, background-color 0.25s ease-out; }
  .tag.active, .tag:hover {
    background-color: #8089ff;
    color: #FFF; }

/* 30.11 :: Blog Searchbar */
.ui-search-bar {
  position: relative; }
  .ui-search-bar input {
    display: block;
    width: 100%;
    border: none;
    padding: .5rem 1rem .5rem 2.5rem; }
  .ui-search-bar::after {
    display: block;
    position: absolute;
    content: '';
    top: 50%;
    left: .75rem;
    width: 16px;
    height: 16px;
    margin-top: -8px;
    background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDIxLjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkNhcGFfMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgeD0iMHB4IiB5PSIwcHgiCgkgdmlld0JveD0iMCAwIDQ2MCA0NjAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDQ2MCA0NjA7IiB4bWw6c3BhY2U9InByZXNlcnZlIj4KPHN0eWxlIHR5cGU9InRleHQvY3NzIj4KCS5zdDB7ZmlsbDojODA4OUZGO30KPC9zdHlsZT4KPGc+Cgk8Zz4KCQk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMzg0LDE5MkMzODQsODYsMjk4LDAsMTkyLDBDODYsMCwwLDg2LDAsMTkyczg2LDE5MiwxOTIsMTkyQzI5OCwzODQsMzg0LDI5OCwzODQsMTkyeiBNMTkyLDMzNgoJCQljLTc5LjQsMC0xNDQtNjQuNi0xNDQtMTQ0UzExMi42LDQ4LDE5Miw0OGM3OS40LDAsMTQ0LDY0LjYsMTQ0LDE0NFMyNzEuNCwzMzYsMTkyLDMzNnoiLz4KCQk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNNDQ5LjUsNDEyLjRsLTg2LjYtODYuNmMtOS42LDE0LjktMjIuMiwyNy41LTM3LjEsMzcuMWw4Ni42LDg2LjZjMTAuMiwxMC4yLDI2LjksMTAuMiwzNy4xLDAKCQkJQzQ1OS43LDQzOS4yLDQ1OS43LDQyMi42LDQ0OS41LDQxMi40eiIvPgoJPC9nPgo8L2c+Cjwvc3ZnPgo=");
    background-size: cover;
    z-index: 1; }

/* 31 :: CLIENT LOGOS */
.ui-clients-logos {
  text-align: center;
  padding: 4rem 0 0 0; }
  .ui-clients-logos.section.section-sm {
    padding: 1.5rem 0; }
    @media (min-width: 1367px) {
      .ui-clients-logos.section.section-sm {
        padding: 2rem 0; } }
  .ui-clients-logos img {
    display: inline-block;
    height: 16px;
    width: auto; }
    @media (min-width: 740px) {
      .ui-clients-logos img {
        height: 20px; } }
    @media (min-width: 992px) {
      .ui-clients-logos img {
        height: 24px; } }
    @media (min-width: 1367px) {
      .ui-clients-logos img {
        height: 26px; } }
  .ui-clients-logos.row > div, .ui-clients-logos .row > div {
    width: 20%; }
    @media (max-width: 580px) {
      .ui-clients-logos.row > div, .ui-clients-logos .row > div {
        width: 25%; }
        .ui-clients-logos.row > div img, .ui-clients-logos .row > div img {
          height: 14px; }
        .ui-clients-logos.row > div:nth-last-child(1), .ui-clients-logos .row > div:nth-last-child(1) {
          display: none; } }
    @media (max-width: 380px) {
      .ui-clients-logos.row > div, .ui-clients-logos .row > div {
        width: 33.3333333%; }
        .ui-clients-logos.row > div:nth-child(1), .ui-clients-logos .row > div:nth-child(1) {
          display: none; } }

/* 32 :: DEVICE SLIDER */
.ui-device-slider {
  position: relative;
  width: 300px;
  margin: 0 auto;
  padding-bottom: 2rem; }
  .ui-device-slider .device img {
    max-width: 100%;
    height: auto;
    width: 100%; }
  .ui-device-slider .screens {
    position: absolute;
    width: 231px;
    top: 12.5%;
    left: 11.5%;
    right: 11.5%;
    bottom: 14%; }
    .ui-device-slider .screens .item {
      width: 231px; }
      .ui-device-slider .screens .item img {
        max-width: 100%;
        height: auto;
        width: 100%;
        background-color: #FFF; }
  .ui-device-slider .owl-carousel.owl-theme .owl-dots {
    margin-top: 5rem; }

.section .row > div .ui-device-slider .device img {
  float: none; }

/* 33 :: PRICING CARDS */
.ui-pricing-cards {
  max-width: 1000px;
  margin: 0 auto;
  text-align: center; }

/* 33.1 :: Card */
.ui-pricing-card .ui-card .card-header .heading {
  margin-bottom: .75rem; }
.ui-pricing-card .ui-card .card-header .price {
  font-family: 'Nunito', sans-serif;
  margin-bottom: 1rem; }
  .ui-pricing-card .ui-card .card-header .price .curency, .ui-pricing-card .ui-card .card-header .price .period {
    font-size: 1.1rem;
    font-weight: 600; }
  .ui-pricing-card .ui-card .card-header .price .price {
    font-size: 3.6rem;
    line-height: 1;
    font-weight: 700; }
.ui-pricing-card .ui-card ul {
  list-style: none;
  padding-left: 0;
  margin-top: .75rem;
  margin-bottom: 1.5rem; }
  .ui-pricing-card .ui-card ul li {
    line-height: 2;
    font-weight: 600; }

/* 33.2 :: Pricing Footer */
.ui-pricing-footer {
  text-align: center;
  margin-top: 6rem; }
  .ui-pricing-footer .paragraph {
    display: inline-block;
    max-width: 800px; }

/* 33.3 :: Pricing Cards Carousel */
.ui-pricing-cards.owl-carousel {
  width: 250px;
  margin: 0 auto; }
  .ui-pricing-cards.owl-carousel .owl-stage-outer {
    overflow: visible; }
  .ui-pricing-cards.owl-carousel .owl-stage > div:nth-child(1), .ui-pricing-cards.owl-carousel .owl-stage > div:nth-child(3) {
    z-index: 1; }
  .ui-pricing-cards.owl-carousel .owl-stage > div:nth-child(2) {
    z-index: 2; }
  .ui-pricing-cards.owl-carousel .owl-stage > div:nth-child(1) .ui-card {
    margin-right: -3rem;
    margin-left: 3rem; }
  .ui-pricing-cards.owl-carousel .owl-stage > div:nth-child(3) .ui-card {
    margin-right: 3rem;
    margin-left: -3rem; }
  .ui-pricing-cards.owl-carousel .owl-stage > div:nth-child(2) .ui-card {
    margin-top: -1rem; }
    .ui-pricing-cards.owl-carousel .owl-stage > div:nth-child(2) .ui-card .card-header {
      padding-top: 3rem; }
    .ui-pricing-cards.owl-carousel .owl-stage > div:nth-child(2) .ui-card .card-body {
      padding-bottom: 3rem; }
  .ui-pricing-cards.owl-carousel .owl-dots {
    margin-top: 3rem; }
  @media (min-width: 481px) {
    .ui-pricing-cards.owl-carousel {
      width: 333.3333333px; } }
  @media (min-width: 740px) {
    .ui-pricing-cards.owl-carousel {
      margin: 0 -5%;
      width: 110%; } }
  @media (min-width: 1200px) {
    .ui-pricing-cards.owl-carousel {
      margin: 0 auto;
      width: 1000px; } }

/*  34 :: TABBED SHOWCASE*/
@media (max-width: 739px) {
  .ui-tabbed-showcase > div:nth-child(1) {
    margin-bottom: 4rem; } }

/* 35 :: TESTIMONIALS */
.ui-testimonials .owl-stage-outer {
  margin: 0 -8px;
  padding-left: 8px;
  padding-top: .35rem; }
.ui-testimonials .item .user {
  padding: 2rem 0;
  padding-left: .25rem; }
  .ui-testimonials .item .user:before, .ui-testimonials .item .user:after {
    content: " ";
    display: table; }
  .ui-testimonials .item .user:after {
    clear: both; }
  .ui-testimonials .item .user .avatar {
    width: 60px;
    height: 60px;
    border-radius: 100%;
    margin-right: 1rem;
    float: left;
    overflow: hidden; }
    .ui-testimonials .item .user .avatar img {
      width: 100%;
      max-width: 100%;
      height: auto; }
  .ui-testimonials .item .user .info {
    float: left; }
    .ui-testimonials .item .user .info .heading {
      line-height: 1;
      margin-bottom: .25rem;
      margin-top: .25rem; }
    .ui-testimonials .item .user .info .sub-heading {
      margin-bottom: 0;
      font-size: .95rem; }
.ui-testimonials .item .ui-card {
  position: relative;
  padding: 1.5rem;
  overflow: visible;
  text-align: center; }
  .ui-testimonials .item .ui-card p {
    font-family: 'Nunito', sans-serif;
    color: #414c5a;
    margin-bottom: 0;
    font-weight: 600; }
  .ui-testimonials .item .ui-card::before {
    display: block;
    position: absolute;
    content: '';
    background-image: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDIxLjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPgo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkxheWVyXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IgoJIHZpZXdCb3g9IjAgMCA1MTIgNTEyIiBzdHlsZT0iZW5hYmxlLWJhY2tncm91bmQ6bmV3IDAgMCA1MTIgNTEyOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+CjxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+Cgkuc3Qwe2ZpbGw6IzgwODlGRjt9Cjwvc3R5bGU+CjxnIGlkPSJRdW90ZW1hcmtzLWxlZnQiPgoJPHBhdGggY2xhc3M9InN0MCIgZD0iTTQwNSwyMDkuOGMtMS0xMS4xLTAuMi00MS41LDI4LjgtODMuNmMyLjItMy4yLDEuOC03LjUtMC45LTEwLjJjLTExLjgtMTEuOC0xOS4yLTE5LjMtMjQuMy0yNC41CgkJYy02LjgtNi45LTkuOC0xMC0xNC40LTE0LjFjLTMtMi43LTcuNi0yLjgtMTAuNi0wLjFjLTUwLjYsNDQtMTA2LjgsMTM1LTk4LjcsMjQ2LjVjNC44LDY1LjUsNTIuNSwxMTMsMTEzLjUsMTEzCgkJYzYyLjYsMCwxMTMuNS01MC45LDExMy41LTExMy41QzUxMiwyNjIuOCw0NjQuNiwyMTMuMiw0MDUsMjA5Ljh6Ii8+Cgk8cGF0aCBjbGFzcz0ic3QwIiBkPSJNMTIwLjksMjA5LjhjLTEtMTEuMS0wLjMtNDEuNCwyOC44LTgzLjZjMi4yLTMuMiwxLjgtNy41LTAuOS0xMC4yYy0xMS44LTExLjgtMTkuMS0xOS4zLTI0LjMtMjQuNQoJCWMtNi44LTYuOS05LjktMTAuMS0xNC40LTE0LjJjLTMtMi43LTcuNi0yLjctMTAuNi0wLjFjLTUwLjYsNDQtMTA2LjgsMTM1LTk4LjcsMjQ2LjV2MGM0LjgsNjUuNCw1Mi41LDExMywxMTMuNSwxMTMKCQljNjIuNiwwLDExMy41LTUwLjksMTEzLjUtMTEzLjVDMjI3LjksMjYyLjgsMTgwLjUsMjEzLjIsMTIwLjksMjA5Ljh6Ii8+CjwvZz4KPC9zdmc+Cg==");
    background-size: cover;
    top: .75rem;
    left: 1rem;
    width: 40px;
    height: 40px;
    opacity: 0.2; }
  .ui-testimonials .item .ui-card::after {
    display: block;
    font-family: 'FontAwesome';
    content: '\f0d7';
    position: absolute;
    top: 100%;
    font-size: 50px;
    height: 10px;
    line-height: 10px;
    left: 1rem;
    color: #FFF;
    text-shadow: 0 5px 5px rgba(0, 9, 128, 0.05), 0 5px 10px rgba(0, 9, 128, 0.05); }

/* 32 :: COMING SOON PAGE */
body.coming-soon .ui-hero {
  padding: 2rem 0 14rem 0; }
  @media (min-width: 740px) {
    body.coming-soon .ui-hero {
      padding: 6rem 0 14rem 0; } }
  @media (min-width: 1367px) {
    body.coming-soon .ui-hero {
      padding: 8rem 0 16rem 0; } }
  body.coming-soon .ui-hero .container {
    padding-top: 0; }
body.coming-soon .ui-app-icon {
  margin-bottom: .5rem; }
body.coming-soon .app-logo {
  display: block;
  margin: 0 auto 2rem auto; }
body.coming-soon .form-card {
  position: relative;
  max-width: 500px;
  margin: 4rem auto -16rem auto; }
  body.coming-soon .form-card .heading {
    font-size: 2rem;
    margin-bottom: 0; }
  body.coming-soon .form-card input.form-control {
    padding: 8px 1rem 8px 1.5rem;
    border-top-left-radius: 2rem;
    border-bottom-left-radius: 2rem; }
  body.coming-soon .form-card .btn {
    padding: 0 1rem;
    line-height: 35px; }
body.coming-soon .actions {
  padding-top: 6rem; }

/*  32.1 :: UI Counter */
body.coming-soon .ui-counter {
  margin-top: 3rem; }
  body.coming-soon .ui-counter > div {
    display: inline-block;
    width: 50px;
    height: 50px;
    box-shadow: 0 5px 10px rgba(0, 9, 128, 0.035), 0 7px 18px rgba(0, 9, 128, 0.05);
    background-color: rgba(255, 255, 255, 0.075);
    padding: 8px 0 4px 0;
    margin-left: 1rem;
    border-radius: .5rem; }
    body.coming-soon .ui-counter > div:nth-child(1) {
      margin-left: 0; }
    body.coming-soon .ui-counter > div .value {
      font-weight: 700;
      color: #FFF;
      height: 18px;
      line-height: 18px;
      margin-bottom: 2px;
      font-size: 1.4rem; }
    body.coming-soon .ui-counter > div .label {
      margin-bottom: 0;
      height: 18px;
      line-height: 16px;
      font-size: .8rem;
      font-weight: 600; }
    @media (min-width: 376px) {
      body.coming-soon .ui-counter > div {
        width: 70px;
        height: 70px;
        padding: 10px 0 5px 0; }
        body.coming-soon .ui-counter > div .value {
          height: 26px;
          line-height: 26px;
          margin-bottom: 4px;
          font-size: 1.8rem; }
        body.coming-soon .ui-counter > div .label {
          line-height: 17px;
          font-size: 9; } }
    @media (min-width: 481px) {
      body.coming-soon .ui-counter > div {
        width: 80px;
        height: 80px;
        padding: 14px 0 8px 0; }
        body.coming-soon .ui-counter > div .value {
          height: 32px;
          line-height: 32px;
          margin-bottom: 6px;
          font-size: 2.4rem; }
        body.coming-soon .ui-counter > div .label {
          line-height: 18px;
          font-size: 1; } }
    @media (min-width: 740px) {
      body.coming-soon .ui-counter > div {
        width: 86px;
        height: 86px;
        padding: 16px 0 9px 0; }
        body.coming-soon .ui-counter > div .value {
          height: 34px;
          line-height: 34px;
          margin-bottom: 8px;
          font-size: 2.8rem; } }
    @media (min-width: 992px) {
      body.coming-soon .ui-counter > div {
        width: 92px;
        height: 92px;
        padding: 18px 0 10px 0; }
        body.coming-soon .ui-counter > div .value {
          line-height: 36px;
          margin-bottom: 8px;
          font-size: 3rem; } }
.show-container {
  position: absolute;
  top: 125%;
  left: 50%;
  transform: translate(-50%, -50%);
  width: 350px;
}

.rounded {
  height: 100%;
  border-radius: 999px;
  overflow: hidden;
  transform: translateZ(0);
}

.progress-container {
  position: relative;
}

.progress {
  position: relative;
  width: 100%;
  height: 20px;
  background-color: #e7edf4;
  border-radius: 99px;
}

.progress .progress-bar {
  position: relative;
  height: 100%;
  background-color: #00c0fb;
  transition: width .2s linear;
}

.progress .progress-number {
  position: absolute;
  left: 0;
  top: 0;
  transition: transform .2s linear;
}

.progress .progress-number:before {
  content: "";
  position: absolute;
  top: -10px;
  left: 0;
  transform: translateX(-50%);
  border-top: 5px solid #525961;
  border-left: 5px solid transparent;
  border-right: 5px solid transparent;
}

.progress .progress-number:after {
  content: attr(aria-valuenow);
  position: absolute;
  left: 0;
  top: -10px;
  transform: translate(-50%, -100%);
  padding: 4px 10px;
  color: #fff;
  font-size: 13px;
  font-weight: 300;
  background-color: #525961;
  border-radius: 3px;
}

.button-container {
  display: block;
  text-align: center;
  padding: 60px 0;
}

.button {
  color: #1F2225;
  font-weight: 400;
  text-decoration: none;
  border: 2px solid #525961;
  padding: 10px 25px;
  transition: all .15s ease-in-out;
}

.button:hover {
  background-color: #525961;
  color: #fff;
}
.form {
    padding: 20px 0;
    padding-bottom: 10px;
   background: #020242;
   background-size:cover;
    position: fixed;
    bottom: 0;
    width: 100%;
    z-index: 1000;
}

.form .form-group{
	margin-bottom:0px !important;}

.form h5{
	font-size: 20px !important;
line-height: 25px;
color: #fff;
font-weight: 300;
margin-bottom: 2px;
margin-top: 10px;}

	.form h3{
	font-size: 20px;
line-height: 30px;
color: #fff;
font-weight: 400;
margin: 20px 0 0; }

	.ui-hero.ui-hero-slider{
		background:url(<?php echo site_url();?>/wp-content/uploads/2018/03/banner3.jpg) no-repeat;
		background-size:cover;
		background-position:center;}





	.ui-hero .heading, .paragraph, .actions.sp-layer{
		text-align:center;}

		.form-group {
    margin-bottom: 1rem;

    height: 65px;
    vertical-align: middle;
	border-radius: 10px !important;
}
.form1{
	vertical-align: middle;

margin-top: 15px;}

	.form1 .btn {
  display: inline-block;
  margin-bottom: 0;
  font-weight: 600;
  font-size: 1.25rem;
  text-align: center;
  vertical-align: middle;
  touch-action: manipulation;
  cursor: pointer;
  color:#333333;
  background:#FFB606;
  white-space: nowrap;
  line-height: 26px !important;
border-radius: 43px !important;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none; }
  .form1 .btn:hover{
	  color:#333333 !important;}

/*  popup*/
ul.actions {
  cursor: default;
  list-style: none;
  padding-left: 0;
}

ul.actions li {
  display: inline-block;
  padding: 0 1em 0 0;
  vertical-align: middle;
}

ul.actions li:last-child {
  padding-right: 0;
}

.contact-container {
  width: 100%;
  /*   padding-top: 20%; */
  margin-left: auto;
  margin-right: auto;
  text-align: center;
}


/* Checkbox */

input[type="checkbox"] {
  -moz-appearance: none;
  -webkit-appearance: none;
  -o-appearance: none;
  -ms-appearance: none;
  appearance: none;
  display: block;
  float: left;
  margin-right: -2em;
  opacity: 0;
  width: 1em;
  z-index: -1;
}

input[type="checkbox"] + label {
  text-decoration: none;
  color: #646464;
  cursor: pointer;
  display: inline-block;
  font-size: 1em;
  font-weight: 300;
  padding-left: 2.4em;
  padding-right: 0.75em;
  position: relative;
}

input[type="checkbox"] + label:before {
  -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  font-family: FontAwesome;
  font-style: normal;
  font-weight: normal;
  text-transform: none !important;
}

input[type="checkbox"] + label:before {
  background: rgba(144, 144, 144, 0.075);
  border-radius: 0.5em;
  border: solid 1px rgba(144, 144, 144, 0.25);
  content: '';
  display: inline-block;
  height: 1.65em;
  left: 0;
  line-height: 1.58125em;
  position: absolute;
  text-align: center;
  top: 0;
  width: 1.65em;
}

input[type="checkbox"]:checked + label:before {
  background: #494d53;
  border-color: #494d53;
  color: #ffffff;
  content: '\f00c';
}

input[type="checkbox"]:focus + label:before {
  border-color: #47cdd9;
  box-shadow: 0 0 0 1px #47cdd9;
}

input[type="checkbox"] + label:before {
  border-radius: 0.5em;
}


/* Buttons */

input[type="submit"],
input[type="reset"],
input[type="button"],
.button {
  -moz-appearance: none;
  -webkit-appearance: none;
  -o-appearance: none;
  -ms-appearance: none;
  appearance: none;
  -moz-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  -webkit-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  -o-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  -ms-transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
  background-color: transparent;
  border-radius: 0.5em;
  border: solid 1px #232626 !important;
  color: #545454 !important;
  cursor: pointer;
  display: inline-block;
  font-size: 20px;
font-weight: 700;

  letter-spacing: 0.1em;
  line-height: 25px;
  overflow: hidden;
  padding: 15px  1.4em;
  text-align: center;
  text-decoration: none;
  text-overflow: ellipsis;
  text-transform: uppercase;
  white-space: nowrap;
}

input[type="submit"]:hover,
input[type="reset"]:hover,
input[type="button"]:hover,
.button:hover {
  background-color: rgba(144, 144, 144, 0.075);
  color: #545454 !important;
}

input[type="submit"]:active,
input[type="reset"]:active,
input[type="button"]:active,
.button:active {
  background-color: rgba(144, 144, 144, 0.2);
}

input[type="submit"].icon,
input[type="reset"].icon,
input[type="button"].icon,
.button.icon {
  padding-left: 1.35em;
}

input[type="submit"].icon:before,
input[type="reset"].icon:before,
input[type="button"].icon:before,
.button.icon:before {
  margin-right: 0.5em;
}

#submit {
  background: #47cdd9;
  color: #fff !important;
  border-color: #fff !important
}


/* Popup */

.cd-popup {
  position: fixed;
  left: 0;
  top: 0;
  height: 100%;
  width: 100%;
  background-color: rgba(94, 110, 141, 0.9);
  opacity: 0;
  visibility: hidden;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0.3s;
  transition: opacity 0.3s 0s, visibility 0s 0.3s;
  overflow-y: auto;
  z-index: 10000;
}

.cd-popup.is-visible {
  opacity: 1;
  visibility: visible;
  -webkit-transition: opacity 0.3s 0s, visibility 0s 0s;
  -moz-transition: opacity 0.3s 0s, visibility 0s 0s;
  transition: opacity 0.3s 0s, visibility 0s 0s;
}

.cd-popup-container {
  overflow-x: hidden;
  border: none;
  position: relative;
 width: 95% !important;
max-width: 95% !important;
  margin-left: auto;
  margin-right: auto;
  text-align: center;
  background: #020242;
  border-radius: .25em .25em .4em .4em;
  text-align: center;
  box-shadow: none;
  -webkit-transform: translateY(-40px);
  -moz-transform: translateY(-40px);
  -ms-transform: translateY(-40px);
  -o-transform: translateY(-40px);
  transform: translateY(-40px);
  /* Force Hardware Acceleration in WebKit */
  -webkit-backface-visibility: hidden;
  -webkit-transition-property: -webkit-transform;
  -moz-transition-property: -moz-transform;
  transition-property: transform;
  -webkit-transition-duration: 0.3s;
  -moz-transition-duration: 0.3s;
  transition-duration: 0.3s;
}

.cd-popup-container p {
  margin: 0;
  padding: 1em 1em;
  padding-top: 0.3em;
}

.cd-popup-container .popup_close_apply .cd-popup-close {
  position: absolute;
  top: 0px;
  right: 12px;
}

.cd-close-button {
  color: #fff;
  border-bottom: none;
}

.cd-popup-container .cd-popup-close::before {
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
  transform: rotate(45deg);
  left: 8px;
}

.cd-popup-container .cd-popup-close::after {
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
  transform: rotate(-45deg);
  right: 8px;
}

.is-visible .cd-popup-container {
  -webkit-transform: translateY(0);
  -moz-transform: translateY(0);
  -ms-transform: translateY(0);
  -o-transform: translateY(0);
  transform: translateY(0);
}

@media only screen and (min-width: 1170px) {
  .cd-popup-container {
    margin: 30px auto;
  }
}


/* Contact Form */

label:hover {
  cursor: text !important;
}

.actions a{position: fixed;
text-align: center;
top: 40%;
right: 10px;
width: 100%;
z-index: 999;
width: 143px;
padding:0 !important;
border:none !important;

color: #fff !important;}
.contact-form {
  background: #020242 !important;
  height: auto;
  margin: 100px auto;
  max-width: 320px;
  overflow: hidden !important;
  width: 100%;
  -moz-border-radius: 5px;
  -webkit-border-radius: 5px;
  border-radius: 5px;
  -moz-box-shadow: rgba(26, 26, 26, 0.1) 0 1px 3px 0;
  -webkit-box-shadow: rgba(26, 26, 26, 0.1) 0 1px 3px 0;
  box-shadow: rgba(26, 26, 26, 0.1) 0 1px 3px 0;
}

@media (max-width: 500px) {
  .contact-form {
   margin-top: 54px;
padding: 1em 0.3em;
width: 97% !important;
max-width: 95% !important;
-moz-border-radius: 0px;
-webkit-border-radius: 0px;
border-radius: 0px;
-moz-box-shadow: rgba(26, 26, 26, 0.1) 0 0px 0px 0;
-webkit-box-shadow: rgba(26, 26, 26, 0.1) 0 0px 0px 0;
box-shadow: rgba(26, 26, 26, 0.1) 0 0px 0px 0;
  }
}

.contact-form .email,
.contact-form .message,
.contact-form .name {
  overflow-x: hidden;
  position: relative !important;
  -moz-border-radius: none !important;
  -webkit-border-radius: none !important;
  border-radius: none !important;
}

.contact-form .email input:focus,
.contact-form .email textarea:focus,
.contact-form .message input:focus,
.contact-form .message textarea:focus,
.contact-form .name input:focus,
.contact-form .name textarea:focus {
  background: #f4f5f6 !important;
}

.contact-form .email label,
.contact-form .message label,
.contact-form .name label {
  color: #cbd0d3 !important;
  left: 23px !important;
  position: absolute !important;
  top: 23px !important;
  -moz-transition: all, 150ms !important;
  -o-transition: all, 150ms !important;
  -webkit-transition: all, 150ms !important;
  transition: all, 150ms !important;
}

.contact-form .email.typing label,
.contact-form .message.typing label,
.contact-form .name.typing label {
  color: #3498db !important;
  font-size: 10px !important;
  top: 7px !important;
}

.contact-form .email,
.contact-form .name {
  width: calc(50% - 1px) !important;
}

@media (max-width: 500px) {
  .contact-form .email,
  .contact-form .name {
    width: 100% !important;
  }
}

.contact-form .email input,
.contact-form .name input {
  padding: 23px 0 8px 23px !important;
}

.contact-form .email {
  border-left: 1px #e6e6e6 solid !important;
  float: right !important;
}

@media (max-width: 500px) {
  .contact-form .email {
    border-left: none !important;
    border-top: 1px #e6e6e6 solid !important;
  }
}

.contact-form .message {
  border-bottom: 1px #e6e6e6 solid !important;
  border-top: 1px #e6e6e6 solid !important;
  clear: both !important;
}

.contact-form .message textarea {
  height: 200px !important;
  padding: 23px !important;
}

.contact-form .name {
  float: left !important;
}

.contact-form .submit {
  background: #f4f5f6 !important;
  display: block !important;
  overflow: hidden !important;
  padding: 23px !important;
  margin-bottom: 2em;
}

.contact-form .submit .user-message {
  float: left !important;
  padding-top: 22px !important;
}

@media (max-width: 500px) {
  .contact-form .submit .user-message {
    float: none !important;
    padding: 0 0 10px !important;
  }
}

.ui-hero.ui-hero-slider .sp-buttons{
	display:none !important;}
	.ui-hero .heading {
		color:#fff !important;
		max-width:890px;
		margin-left:auto;
		margin-right:auto;
		}
		.ui-hero .paragraph {

		color:#fff !important;



		padding:10px 20px;
		max-width: 720px;
margin: 0 auto;
border-radius: 26px;
		}

		.sp-horizontal .sp-arrows{
			display:none !important;}


.boxpack{

	background-color: #008fbf;
border-radius: 8px;
box-shadow: 0 8px 15px rgba(125, 147, 178, .25);
transition: all .3s;
padding: 25px 10px;
z-index:99999;
text-align:center;
min-height:222px;}
.boxpack h2{
font-size:23px !important;
line-height:28px !important;
margin-bottom:2px !important;
font-weight:300;}

.boxpack:hover {
    background: #ffe0b2;
    background: -webkit-linear-gradient(45deg, #008fbf 0%, #234795 100%);
    background: linear-gradient(45deg, #008fbf 0%, #234795 100%);
    border-radius: 8px;
    box-shadow: 0 20px 30px rgba(125, 147, 178, .15);
    transition: all .3s;
   padding: 25px 10px;
}

.eligibiliy h4{
	font-weight:300;
	font-size:22px;
	line-height:30px;
	margin-bottom:30px;
	}

	.points h5{
		margin-top:0px;}

		.brochure{
		background: #FFA600;
max-width: 360px;
margin: 10px auto;
padding: 10px 20px 15px;
max-width: 360px;
border-radius: 20px;
font-size: 28px;
line-height: 34px !important;}
			.boxpack .section-heading{
			 height:100%;
	 }
   ul.ui-icon-blocks.icons-lg.ui-blocks-v.who-we-are-block li > h5 {
     margin-top: 0;
     margin-bottom: 0;
   }
	 .btnmar .btn{
		 margin:20px auto;
		 background:#234795 !important;
		 color:#fff;
		 padding:20px 41px;}
		 .btnmar{
			 margin-bottom:20px !important;}

			 .cd-popup-container input, textarea{
				 border:none !important;}

				 .cat-sec {
    float: left;
    width: 100%;
}
.row.no-gape {
    margin: 10px;
}
.row.no-gape > div {

}
.p-category {
	margin:10px 0;
    float: left;
    width: 100%;
    z-index: 1;
    position: relative;
}
.p-category > div {
    float: left;
    width: 100%;
    text-align: center;
    padding-bottom: 30px;
    border-bottom: 1px solid #e8ecec;
    border-right: 1px solid #e8ecec;
}
.p-category.green > div i {
    color: #647585;
}
.p-category > div i {
    float: left;
    width: 100%;
    color: #8b91dd;
    font-size: 70px;
    margin-top: 30px;
}
.p-category > div span {
    float: left;
width: 100%;
font-family: 'Nunito', sans-serif;
font-size: 18px;
color: #202020;
margin-top: 3px;
min-height: 70px;
padding: 10px 20px;

}
.p-category > div p {
    float: left;
    width: 100%;
    font-size: 14px;
    margin: 0;
    margin-top: 0px;
    margin-top: 3px;

}
.p-category:hover {
    background: #ffffff;
   box-shadow: 0 10px 10px -10px rgba(0, 0, 0, 0.5);
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 8px;
    width: 104%;
    margin-left: -2%;
    transform: translateY(-4px) scale(1.02);
    z-index: 10;
}
.p-category{
	background: #ffffff;
    -webkit-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
    -moz-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
    -ms-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
    -o-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
    box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    -ms-border-radius: 8px;
    -o-border-radius: 8px;
    border-radius: 0px;
    transition: all .25s ease;
    width: 100%;


    z-index: 10;
}

.p-category.blue{
	color:#fff !important;
background: -moz-linear-gradient(45deg, #8089ff 0%, #54ceff 100%);
background: linear-gradient(45deg, #8089ff 0%, #54ceff 100%);}
.p-category.orange{
	color:#fff !important;
background: -moz-linear-gradient(45deg, #7E8AE5 0%, #F65FD0 100%);
background: linear-gradient(45deg, #7E8AE5 0%, #F65FD0 100%);}
.p-category.red{
	color:#fff !important;
background: -moz-linear-gradient(45deg, #EF737E 0%, #FDA43D 100%);
background: linear-gradient(45deg, #EF737E 0%, #FDA43D 100%);}
.p-category.red > div span {
	color:#fff !important;}
	.p-category.orange > div span {
	color:#fff !important;}
.p-category.blue > div span {
	color:#fff !important;}

	.text-white{
		color:#fff !important;}

		.martop40{
			margin-top:30px;}

			.second{
				padding:0 0 2rem;}
				.third{
				padding:2rem 0 3rem;}

			.ui-eligibility{
				max-width:920px;
				background:#E3272A;
				margin:20px auto;
				border:1px solid #ccc;}
				.p0{
					padding:0 !important;}
					.lefts{
						background:#F73C80;}
						.right{
						background:#FFFFFF;}

						.boxpack1{
							margin: 10px 0;
	background-color: #fff;
border-radius: 8px;
-webkit-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
-moz-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
-ms-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
-o-box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
box-shadow: 0px 0px 25px rgba(0,0,0,0.1);
transition: all .3s;
padding: 25px 10px;
z-index:99999;
color:#333333;
text-align:center;
min-height:auto;}
.boxpack1 h2{
font-size:23px !important;
line-height:28px !important;
margin-bottom:2px !important;
font-weight:300;
color:#333333;}
.boxpack1 p{
font-size:16px;
line-height:21px;
margin-bottom:2px;
font-weight:300;
color:#333333;}
.boxpack1 p span{

font-size:22px !important;
line-height:25px !important;
font-weight:500;}

.boxpack1:hover {
   color:#333333;
   background-color: #fff;

    border-radius: 8px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    transition: all .3s;
   padding: 25px 10px;
}

.bg-elig{
	background:url(<?php echo site_url();?>/wp-content/uploads/2018/03/bg-eligibility.jpg) no-repeat;
	background-position:center;
	background-size:cover;}

	.fouth{
		padding:3rem 0 3rem;}

		.martop10{
			margin-top:10px;
			margin-bottom: 12px;}
			.martop12{
				margin-top:16px;}
			.full-screen{


background: #FFB606;
background-size: cover;
position: fixed;
bottom: 0;
width: 100%;
z-index: 99999;

				text-align:center;


			}
			.full-screen p{

				color:#333333;
				padding:10px 0;
				margin-bottom:0 !important;
				font-size:20px;
				line-height:22px;
			}

			.media3 img{

margin-bottom: 12px;}
	.media3 h4{
		font-size:24px;
				line-height:28px;
				}
				.media3 h5{
		font-size:17px;
				line-height:26px;
			}
				.media3 p{
				    font-size: 19px;
    line-height: 25px;
	font-weight:300;
    text-align: center;
    margin-top: 20px;
	color:#414c5a;
}

.gravity_form_footer input[type=text],
.gravity_form_footer input[type=number],
.gravity_form_footer input[type=email]

{
	width:200px;
}
	/*---kuldeep*/
		.gravity_form_footer > .gform_wrapper form#gform_36.gform_body ul.gform_fields, .gravity_form_footer > .gform_wrapper form#gform_9 .gform_body ul.gform_fields
		{
			width:100%;
			margin: 0;
			padding: 0;
		}
		.gform_wrapper form#gform_36 .gform_body ul.gform_fields, .gform_wrapper form#gform_9 .gform_body ul.gform_fields{
			width:100%;
			margin: 0;
			padding: 0 5px 10px 0;
		}
		.gravity_form_footer > .gform_wrapper form#gform_36 .gform_body ul.gform_fields li, .gravity_form_footer > .gform_wrapper form#gform_9 .gform_body ul.gform_fields li{
			width: 25%;
			float: left;
			display: inline-block;
			padding-left: 15px;
			padding-right: 15px;
		}
		.gravity_form_footer > .gform_wrapper form#gform_36 .gform_body ul.gform_fields li .ginput_container input, .gravity_form_footer > .gform_wrapper form#gform_9 .gform_body ul.gform_fields li .ginput_container input{
		width: 100%;
		background-color: #fff;
		}
    .gravity_form_footer > .gform_wrapper form#gform_36 .gform_body ul.gform_fields li .ginput_container_select select{
      background-color: #fff;
      padding: 12px 1rem;
    }
		.tt_cont_form .gform_wrapper form#gform_36 .gform_body ul.gform_fields li,
		.tt_download_form .gform_wrapper form#gform_9 .gform_body ul.gform_fields li{
			margin-bottom: 15px;
			padding-left: 15px;
			padding-right: 15px;
		}
		.popup-form-container{
			clear:both;
			margin: 0 auto;
			width: 100%;
			padding-left: 15px;
			padding-right: 15px;
		}
		.popup-form-container .form-group{
			height: auto;
		}
		.popup_close_apply{
			display: block;
			position: relative;
			height: 30px;
		}
		.gravity_form_footer > .gform_wrapper form#gform_36 .gform_body ul.gform_fields li label{
			display: block;
		}
		@media only screen and (min-width: 320px) and (max-width: 767px){
			.gravity_form_footer > .gform_wrapper form#gform_36 .gform_body ul.gform_fields li{
				width: 100%;
				margin-bottom: 15px;
			}
		}
		@media only screen and (min-width: 768px) and (max-width: 1279px){
			gravity_form_footer > .gform_wrapper form#gform_36 .gform_body ul.gform_fields li {
				width: 25%;
			}
			.gform_button{
				width: 160px !important;
			}
		}



    ul.ui-icon-blocks.icons-lg.ui-blocks-v.who-we-are-block { display: flex; flex-direction:column; margin: 0; padding:0;}
    ul.ui-icon-blocks.who-we-are-block li.ui-icon-block{margin-bottom:20px; display: flex; align-items: center;}
    ul.ui-icon-blocks.who-we-are-block li.ui-icon-block:last-child{margin-bottom:0;}
    ul.ui-icon-blocks.who-we-are-block li.ui-icon-block span{position: static; margin-right:13px;}
    .boxpack1.foryou-block{min-height:auto!important}

    video::-webkit-media-controls-fullscreen-button {
        display: none;
    }
    .callu_us_now{
    background-color: #e7e7e7;
    padding: 40px 0;
    margin-bottom: 45px;
  }


form#gform_36{
  display: flex;
    flex-flow: row;
    justify-content: space-between;
}
.T-cent{
  text-align: center;
}
.single_bnnr_inner_main{
  display: flex;
  flex-direction: column;
  align-items: center;
}
.tt_cont_form > .enquiry_forms_wrapper > form#gform_36{
    flex-direction: column;
  }

  .media3 p span{
  font-weight: 600;
 }
 @media only screen and (min-width: 320px) and (max-width: 479px){
    video{
      width: 290px;
      margin: 0 auto;
      display: block;
    }
  }
  @media only screen and (min-width: 480px) and (max-width: 599px){
    video{
      width: 440px;
      margin: 0 auto;
      display: block;
    }
  }
  @media only screen and (min-width: 320px) and (max-width: 767px){
    form#gform_36{
      flex-direction: column;
    }
    .gravity_form_footer > .gform_wrapper form#gform_36 .gform_body ul.gform_fields li.gform_hidden{
      margin-bottom: 0;
    }
  }
	</style>

</head>

	<body class="ui-transparent-nav" data-fade_in="on-load">
	<?php $course_id="40495";
	$download = get_field('brouchure', $course_id);
		$last_date = get_field('front-end_batch_name', $course_id);
		$date_array = explode("/",$last_date);
		$monthName = date("M", 	mktime(0, 0, 0, $date_array[1], 10));
		$last_date=$date_array[0]." ".$monthName." ".$date_array[2];

	    $duration = get_field('duration', $course_id);
		$fee_inr = get_field('_regular_price', $course_id);
	    $fee_USD = get_field('_outside-india_regular_price', $course_id);

	//echo $fee_usd=  get_post_meta( $course_id, '_outside-india_regular_price', true);
	    $cl_startdate = get_field('course_start_date', $course_id, false, false);
                                //$date = new DateTime($cl_startdate);
                                $timevalue = strtotime($cl_startdate);
                                $start_date = date('d M Y', $timevalue);
	?>

	<!-- Navbar Fixed + Default -->
    <nav class="navbar navbar-fixed-top transparent navbar-default">
		<div class="container">
  		<?php $institute=get_field('c_institute', $course_id);
  		 //$link=get_term_link($institute);
  		?>
  			<!-- Navbar Logo -->
                          <a style="display:none;" class="ui-variable-logo navbar-brand iimk" href="<?php echo site_url()."/iim-kashipur"; ?>" title="Talentedge">
              <img class="logo-default" src="<?php echo  get_template_directory_uri();?>/images/logo/kashipur.jpg" alt="Talentedge" data-uhd>
  				<!-- Transparent Logo -->
  				<img class="logo-transparent martop20" src="<?php echo site_url();?>/wp-content/uploads/2018/03/IIM_K.png" alt="Talentedge" data-uhd>
  				<!-- Default Logo -->

  			</a><!-- .navbar-brand -->

  			<!--
  			<a href="#" class="ui-mobile-nav-toggle pull-right"></a>


  			<a href="#" class="btn btn-sm ui-gradient-peach pull-right">Login</a>-->

  			<!-- Navbar Navigation -->
			<div class="ui-navigation navbar-right">
				<!-- Transparent Logo -->
				<img class="logo-transparent" src="<?php echo site_url();?>/wp-content/uploads/2018/03/tal-logo-2.png" alt="Talentedge" data-uhd>

			</div><!--.ui-navigation -->
		</div><!-- .container -->
	</nav> <!-- nav -->

	<!-- Main Wrapper -->
    <div class="main" role="main">


    	<!-- Hero Slider -->
		<div class="ui-hero ui-hero-slider">
      <div class="single_bnnr_inner_main">
        <h1 class="heading">
        Partner with India's leading Education Brand
        </h1>
        <img src="<?php echo site_url();?>/wp-content/uploads/2018/06/slider-2.png" class="img-responsive">
      </div>

		</div><!-- .ui-hero .slider-pro -->
        <section class="mobile-only">
        <div class="full-screen">
       <a href="#form11" ><p> Enroll Now</p></a>
        </div>
        </section>
   <div class="section ui-gradient-peach form ui-action-section" id="form11">
   			<div class="container-fluid">
   				<div class="">
   					<!-- Text Column -->
   					<div class="col-md-2 col-sm-12 text-block">
                    <h3>Get in touch with us</h3>
                </div>
                    <div class="col-md-10 col-sm-12 text-block">

										<div class="form-group"><div class="form1 gravity_form_footer">


<?php

echo do_shortcode('[gravityform id = 36	title=false description=false ajax=false tabindex=30]');
?>

											</div>
										</div>


                    </div></div></div>
                    </div>

                    <div class="contact-container" style="position: absolute;">

  <ul class="actions">
    <li><a href="#" id="contact" class="button big"><img src="<?php echo site_url();?>/wp-content/uploads/2018/06/enrol-btn.png" alt="btn"></a></li>
  </ul>
</div>
<div class="cd-popup contact" role="alert">
  <div name="contactform" id="contactform" class="contact-form">
    <div class="cd-popup-container">
      <div class="popup_close_apply">
        <a href="" class="cd-popup-close cd-close-button">
          <i class="fa fa-times" style="pointer-events:none;"></i>
        </a>
      </div>
     <div class="popup-form-container">

										<div class="form-group">	<div class="form1 ">
											<span class="tt_cont_form">
												<?php


				echo do_shortcode('[gravityform id=36 title=false description=false ajax=false tabindex=30]');
								 ?></span>
								 <span class="tt_download_form">
								 <?php
	echo do_shortcode('[gravityform id=9 title=false description=false ajax=false tabindex=30]');
								  ?></span>

									</div>						</div>


                    </div>


    </div>
  </div>
</div>

<div class="cd-popup notification" role="alert">
  <div class="cd-popup-container">
    <a href="" class="cd-popup-close cd-close-button"><i class="fa fa-times" style="pointer-events:none;"></i></a>
    <p>
      <h3 id="notification-text">Thanks for getting in touch!</h3>
    </p>
  </div>
</div>






   		<!-- Call To Action Section -->
   		<div class="section " >
   			<div class="container">
   				<div class="row">
                <div class="col-lg-12">

						<div class="cat-sec">
							<div class="row no-gape">
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="p-category orange">
										<div>
											<i class="la la-bullhorn"></i>
											<span>Make more than your salary, earn while you hang out with your friends, colleagues
</span>
										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="p-category white">
										<div>
											<i class="la la-graduation-cap"></i>
											<span>Opportunity to guide your friends in their career & earn respect</span>

										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="p-category red">
										<div>
											<i class="la la-line-chart "></i>
											<span>Industry relevant executive & degree courses from popular interactive domains</span>

										</div>
									</div>
								</div>

							</div>
						</div>
						<div class="cat-sec">
							<div class="row no-gape">
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="p-category white">
										<div>
											<i class="la la-bullhorn"></i>
											<span>Completion rate of courses pegged at 95%
</span>

										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="p-category blue">
										<div>
											<i class="la la-graduation-cap"></i>
											<span>Tried & tested by over 3 lakh learners
</span>

										</div>
									</div>
								</div>
								<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
									<div class="p-category white">
										<div>
											<i class="la la-line-chart "></i>
											<span>Collaborate with leading Indian & international academic brands
</span>

										</div>
									</div>
								</div>

							</div>
						</div>
					</div>





   				</div>
   			</div>
   		</div>
<!----- ----   IIM kashipur Section  -->
        <div class="section second ui-showcase-section">
   			<div class="container">

   				<div class="section-heading center">
   					<h2 class="heading text-indigo">
              Who we are

   					</h2>
   					<p class="paragraph">

   				</div>
   				<div class="row">

   					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 animate certi" data-show="fade-in-right">
              <video width="490" height="275" controls controlsList="nodownload" autoplay="autoplay">
                <source src="https://d37c7ubwjknfep.cloudfront.net/wp-content/uploads/2016/11/video-1.mp4" type="video/mp4">
                <source src="https://d37c7ubwjknfep.cloudfront.net/wp-content/uploads/2016/11/video-1.mp4" type="video/webm">
                <source src="https://d37c7ubwjknfep.cloudfront.net/wp-content/uploads/2016/11/video-1.mp4" type="video/ogg">
              </video>
        	</div>

   					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-5" data-vertical_center="true">

   						<ul class="ui-icon-blocks ui-blocks-v icons-lg who-we-are-block">
   							<li class="ui-icon-block animate points" data-show="fade-in">
   								<span class="icon icon-camera text-purple"></span>
   								<h5 class="text-dark-gray">Most recognized live learning brand amongst working professionals</h5>
   							</li>
   							<li class="ui-icon-block animate" data-show="fade-in">
   								<span class="icon icon-organization text-purple"></span>
   								<h5 class="text-dark-gray">First machine learning and AI based tech platform</h5>

   							</li>
   							<li class="ui-icon-block animate" data-show="fade-in">
   								<span class="icon icon-book-open text-purple"></span>
   								<h5 class="text-dark-gray">300k learners from across 250 cities</h5>

   							</li>
   							<li class="ui-icon-block animate" data-show="fade-in">
   								<span class="icon icon-layers text-purple"></span>
   								<h5 class="text-dark-gray">1600+ million hours of learning delivered </h5>
   							</li>

                <li class="ui-icon-block animate" data-show="fade-in">
                  <span class="icon icon-people text-purple"></span>
                  <h5 class="text-dark-gray">Students from more than 80 highly reputed companies
</h5>
                </li>

                <li class="ui-icon-block animate" data-show="fade-in">
   								<span class="icon icon-pie-chart text-purple"></span>
   								<h5 class="text-dark-gray">Impacted careers of 92% of students who completed the course
 </h5>
   							</li>

   						</ul>
   					</div>
   				</div>

   			</div>
   		</div>




      <div class="section second ui-showcase-section">
      <div class="container">

        <div class="section-heading center">
          <h2 class="heading text-indigo">
            What we have to offer

          </h2>
          <p class="paragraph">
              </p>
        </div>
        <div class="row">

          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 animate certi" data-show="fade-in-right">
            <img src="<?php echo site_url();?>/wp-content/uploads/2018/06/business.png" alt="Talentedge" data-uhd data-max_width="489"/>
          </div>

          <div class="col-xs-12 col-sm-12 col-md-6 col-lg-5" data-vertical_center="true">

            <ul class="ui-icon-blocks ui-blocks-v icons-lg who-we-are-block">
              <li class="ui-icon-block animate points" data-show="fade-in">
                <span class="fa fa-university text-purple"></span>
                <h5 class="text-dark-gray">Courses from top institutes of the country, in demand and being highly searched for
</h5>
              </li>
              <li class="ui-icon-block animate" data-show="fade-in">
                <span class="fa fa-handshake-o text-purple"></span>
                <h5 class="text-dark-gray">Comprehensive handholding, training and induction </h5>

              </li>
              <li class="ui-icon-block animate" data-show="fade-in">
                <span class="fa fa-phone-square text-purple"></span>
                <h5 class="text-dark-gray">Single point contact for all marketing and operational queries & escalation calls etc.
</h5>

              </li>
              <li class="ui-icon-block animate" data-show="fade-in">
                <span class="fa fa-refresh text-purple"></span>
                <h5 class="text-dark-gray">Management of entire student life cycle after enrolment  </h5>

              </li>
            </ul>
          </div>
        </div>

      </div>
    </div>




 <div class="section fouth bg-elig">
   			<div class="container">

   				<div class="section-heading center">
   					<h2 class="heading text-indigo">
              What's in it for you

   					</h2>

   				</div>

                <div class="row">
                	<div class="">
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="boxpack1 foryou-block">


                    <p class="paragraph">
   					 				Opportunity to earn good remuneration and friends respect and appreciation
   					            </p>
                    </div>
                    </div>
                      <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="boxpack1 foryou-block">


                    <p class="paragraph">
                      Collaborate with the most preferred learning partner & industry leader in ed-tech space,
   					</p>
                    </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div class="boxpack1 foryou-block">


                    <p class="paragraph">
                      Market relevant and industry specific courses from world’s leading institutes

                    </p>
                    </div>
                    </div>
                    </div>


                </div>


                </div></div>

   		<!--  Testimonial Section -->
   		<div class="section">
   			<div class="container">
   				<!-- Card Heading -->


   				<div class="col-sm-12 col-xs-12 ui-icon-block text-centr media3 T-cent" >
            <h2 class="heading text-indigo">
              Our learners work with


            </h2>
   					<img src="<?php echo site_url();?>/wp-content/uploads/2018/06/Untitled-1.jpg" alt="alumuni" class="img-csircle col-sm-12 col-xs-12">
   					</div>
        <div class="col-sm-12 col-xs-12 ui-icon-block text-cnter media3  T-cent">
          <h2 class="heading text-indigo">
            Courses offered in partnership with
          </h2>
          <img src="<?php echo site_url();?>/wp-content/uploads/2018/06/Untitled-z1.jpg" alt="alumuni" class="img-cirsdcle col-sm-12 col-xs-12">
   			</div>




   			</div><!-- .container -->
<div class="callu_us_now">
  <div class="container">
    <h2 class="heading text-indigo T-cent">How to connect with Us</h2>
        <div class="col-sm-12 col-xs-12 ui-icon-block text-cnter media3">
          <p>
            Call or send an email to <span>Amit Mishra</span> on Mobile: <span>9711637959</span> and Email id: <span>partner.support2@talentedge.in</span> or fill the form and we will get back to you.

          </p>
        </div>
      </div>
</div>

   		</div><!-- .section -->





    </div>

	<script type="text/javascript" src="<?php echo  get_template_directory_uri();?>/js/jquery.min.js"></script>


    <script type="text/javascript" src="<?php echo  get_template_directory_uri();?>/bootstrap.js"></script>


		<script type="text/javascript" src="<?php echo  get_template_directory_uri();?>/js/jquery.sliderPro.min.js"></script>
	<script type="text/javascript" src="<?php echo  get_template_directory_uri();?>/js/owl.carousel.js"></script>
	<script type="text/javascript" src="<?php echo  get_template_directory_uri();?>/js/form-validator.min.js"></script>
	<script type="text/javascript" src="<?php echo  get_template_directory_uri();?>/js/main.js"></script>
	<script>
jQuery('#input_9_13').val('<?php echo $course_id;?>');

	jQuery('.brochure').click(function(){
			jQuery('#input_9_5').val('<?php echo $download;?>');

		jQuery('.contact').addClass('is-visible');
		 jQuery('.tt_download_form').show();
		   jQuery('.tt_cont_form').hide();

	});
	jQuery('#contact').click(function(){
jQuery('.contact').addClass('is-visible');
		 jQuery('.tt_download_form').hide();
		  jQuery('.tt_cont_form').show();


	});

	</script>
	</body>
	</html>
