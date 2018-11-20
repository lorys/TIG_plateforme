
pacquet = new Array;

function save(data)
{
	pacquet.push(data);
}

document.body.onLoad=function () {
	document.body.setAttribute("onmove", "save([event.clientX, event.clientY], Math.floor(Date.now() / 1000));");

};

function remember()
{
	co = new XMLHttpRequest();
	co.open("POST", "jarvis.php?souvenirs", true);
	co.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	co.send("data=".); 
	co.send(null);
}

setInterval("remember();", 1000);