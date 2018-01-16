// UDMv4.3 // You Are Here extension v1.02 //
/***************************************************************\

  ULTIMATE DROP DOWN MENU Version 4.3 by Brothercake
  http://www.udm4.com/

\***************************************************************/

/***************************************************************\
 * Set you are here parameters
\***************************************************************/

var youAreHere = [
	"index.php",		// default page name [eg "index.php", "default.html" etc]
	"none",	// add text to here-page title ["text"|"none"]
	"none", // add text to here-branch title ["text"|"none"]
	"before",		// where to add title text ["before"|"after"]
	];

/***************************************************************\
\***************************************************************/
var yah = new Object;yah.addToTitle = function(titleNode,titleText){yah.iText = '';yah.nodes = titleNode.childNodes;yah.nodesLen = yah.nodes.length;for(i=0; i<yah.nodesLen; i++){if(yah.nodes[i].nodeType == 3){yah.iText = yah.nodes[i].nodeValue;break;}}yah.title = (titleNode.title == '') ? yah.iText : titleNode.title;yah.title = (youAreHere[3] == 'before') ? titleText + yah.title : yah.title + titleText;titleNode.title = yah.title;};function compareNumbers(a,b){return b[0]-a[0];};um.addReceiver(findHere,'010');function findHere(){yah.uri = top.document.location.href;yah.uri = yah.uri.replace(youAreHere[0],'');yah.matches = [];yah.links = umTree.getElementsByTagName('a');yah.linksLen = yah.links.length;for(var i=0; i<yah.linksLen; i++){yah.href = yah.links[i].href;if(yah.href&&!/[a-z]+\:\/\//.test(yah.href)) { yah.matches = [];break; }yah.href = yah.href.replace(youAreHere[0],'');if(yah.href!=''&&yah.uri.indexOf(yah.href)!=-1){yah.matches[yah.matches.length] = yah.links[i];}}yah.matchesLen = yah.matches.length;if(yah.matchesLen < 1) { return false; }yah.probs = [];for(i=0; i<yah.matchesLen; i++){yah.href = yah.matches[i].href;yah.hrefLen = yah.href.length;yah.probs[i] = [0,yah.href];for(var j=0; j<yah.hrefLen; j++){if(yah.href.charAt(j) == yah.uri.charAt(j)){yah.probs[i][0]++;}}}yah.probs.sort(compareNumbers);yah.href = yah.probs[0][1];yah.links = umTree.getElementsByTagName('a');yah.linksLen = yah.links.length;for(i=0; i<yah.linksLen; i++){if(yah.links[i].href == yah.href){if(youAreHere[1] != 'none'){yah.addToTitle(yah.links[i],youAreHere[1]);}applyHereClass(yah.links[i]);}}return true;};function applyHereClass(linkObject){linkObject.style.zIndex = um.e[6]+=2;(linkObject.className=='') ? linkObject.className = 'udmY' : linkObject.className+= ' udmY';if(youAreHere[2] != 'none'){if(linkObject.title.indexOf(youAreHere[1])==-1){yah.addToTitle(linkObject,youAreHere[2]);}}yah.isNav = (um.gp(linkObject).parentNode.className=='udm');yah.arrow = um.n.ga(linkObject);if(um.s) { yah.arrow = yah.arrow.firstChild; }if(yah.arrow != null){if((yah.isNav&&um.ni)||(!yah.isNav&&um.mi)){yah.arrow.src=um.baseSRC+((yah.isNav)?um.e[46]:(typeof um.w[um.gp(linkObject).className]!=um.un)?um.w[um.gp(linkObject).className][24]:um.e[90]);}}if(!yah.isNav){yah.link = um.gc(um.gp(linkObject).parentNode.parentNode);applyHereClass(yah.link);}};