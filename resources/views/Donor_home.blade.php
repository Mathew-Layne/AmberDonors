<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        body{
  background-image: url("https://images.unsplash.com/photo-1615461065624-21b562ee5566?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxjb2xsZWN0aW9uLXBhZ2V8MXwxMjA5NDM2OHx8ZW58MHx8fHw%3D&w=1000&q=80");
  color: black;
  background-repeat: no-repeat;
  height: 100%;
  width: 100%;
}

.section{
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  grid-gap: 1.6em;
}

#donate{
  grid-column: 6 / span 7;
  text-align: center;
  margin-top: 20em;
  margin-bottom: 30em;
}

.section h1{
  font-family: helvetica;
  font-size: 6em;
  color: white;
  margin-bottom: 0;
  text-align: center;
}

h2{
  font-family: helvetica;
  text-align: center;
  color: white;
  font-size: 2em;
}

.button{
  color: white;
  text-align: center;
  font-size: 2em;
  padding-left: 2em;
  padding-right: 2em;
  padding-top: 1em;
  padding-bottom: 1em;
}

.button{
  background: #F30B0B;
  text-decoration: none;
  color: white;
  font-size: 3em;
  padding: .5em;
  font-family: helvetica;
}

#button{
  margin-top: 3em;
}

img{
  grid-column: 1 / span 12;
  margin-left: 0px;

}

*/{border: 1px solid blue;}
.section{
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  grid-gap 1em;
}

#security{
  grid-column: 2 / span 10;
  margin-left: 2em;
}

#security h1{
  text-align: left;
}

a:link {
    text-decoration: none;
}

a:visited {
    text-decoration: none;
}

#header{
  grid-column: 4 / span 6;
  text-align: center;
}

#bubbles{
  grid-column: 1 / span 1;
  background: lightgray;
  text-align: center;
  font-family: helvetica;
  float: left;
}

.info{
  grid-column: 2 / span 9;
  margin-left: 1em;
}

button.accordion {
    grid-column: 2 / span 9;
    background-color: #F30B0B;
    color: white;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 1.5em;
    transition: 0.4s;
}

button.accordion.active, button.accordion:hover {
    background-color: #F30B0B;
}

div.panel {
    grid-column: 2 / span 9;
    padding: 0 18px;
    display: none;
    background-color: white;
    font-family: helvetica;
    font-size: 1.3em;
}

#helpsupport{
  grid-column: 11 / span 2;
  float: left;
  display: absolute;
  height: 6em;
  font-family: helvetica;
  text-align: center;
  margin-left: 1em;
  font-size: 1.3em;
  margin-right: 1em;
  border: 5px solid black;
  padding-left: 1em;
  padding-right: 1em;
  padding-bottom: 1em;
}

#security h1{
  font-family: helvetica;
  font-size: 4em;
  margin-bottom: -.2em;
  margin-top: -.7em;
  color: #F30B0B;
}

#security p{
  margin-left: 1em;
}

input[type="text"], input[type="password"], input[type="number"], input[type="tel"]{
  width: 20em;
  border: 2px solid black;
  padding: .5em;
}

#bubbles{
  font-size:1em;
  margin-left: none;
}

#bubbles li{
  margin-left: -2em;
  margin-down:3px;
}

ul{ list-style-type: none; }

.panel input["btn"]{
   background: #F30B0B;
  text-decoration: none;
  color: white;
  font-size: 3em;
  padding: .5em;
  font-family: helvetica;
}

fieldset {
  border: 0;
  margin: 0;
  padding: 0;
}



/* , from home page */



    </style>

</head>
<body>

    <div class="section">


        <div id="donate">
        <h1> SAVE A LIFE.</h1>
        <h2> Help donate blood to save a life. Better than letting mosquitos having it.</h2>
         <div id="button">
          <a href="/d_form" button class="button">DONATE</button></a>
          </button>
          </donate>
      </div>
      </div>

</body>
</html>
