// UDMv4.301 //
/***************************************************************/
var um={'menuClasses':[],'itemClasses':[],'menuCode':[]};
/***************************************************************\

  ULTIMATE DROP DOWN MENU Version 4.301 by Brothercake
  http://www.udm4.com/

  This script may not be used or distributed without license

\***************************************************************/


/***************************************************************\
 * CORE CONFIGURATION
\***************************************************************/


//path to images folder
um.baseSRC = "inc/gfx/menu/";


//navbar orientation
um.orientation = [
	"horizontal",	// alignment ["vertical"|"horizontal"|"popup"]
	"left",		// h align ["left"|"right"]
	"top",		// v align ["top"|"bottom"]
	"relative",	// positioning ["relative"|"absolute"|"fixed"|"allfixed"]
	"0.5em",		// x position ["em"|"ex"|"px"|"0"]
	"0.5em",		// y position ["em"|"ex"|"px"|"0"]
	"1000",		// z order ["0" to "10000"] (menu takes 20000 headroom)
	];


//navbar list output
um.list = [
	"flexible",	// horizontal overflow ["rigid"|"flexible"]
	"yes",		// show menus to IE-based screenreaders ["yes"|"no"]
	"yes",		// hide static menus for netscape 4 ["yes"|"no"]
	];


//menu behaviors
um.behaviors = [
	"200",		// open timer ["milliseconds"|"0"]
	"500",		// close timer ["milliseconds"|"never"|"0"]
	"yes",		// reposition menus to stay inside the viewport ["yes"|"no"]
	"default",	// manage windowed controls for win/ie ["default","hide","iframe","none"]
	];


//reset behaviors
um.reset = [
	"yes",		// reset from document mouse click ["yes"|"no"]
	"yes",		// reset from window resize ["yes"|"no"]
	"yes",		// reset from text resize ["yes"|"no"]
	];


//horizontal continuation strip
um.hstrip = [
	"none",		// background ["color"|"#hex"|"rgb()"|"image.gif"|"none"]
	"yes",		// copy navbar item margin-right to margin-bottom ["yes"|"no"]
	];


/***************************************************************\
 * MODULE SETTING
\***************************************************************/


//keyboard navigation [comment out or remove if not using]
um.keys = [
	"38",		// up ["n"] ("38" = up arrow key)
	"39",		// right ["n"] ("39" = right arrow key)
	"40",		// down ["n"] ("40" = down arrow key)
	"37",		// left ["n"] ("37" = left arrow key)
	"123",		// hotkey ["n"] ("38" = F12]
	"none",		// hotkey modifier ["none"|"shiftKey"|"ctrlKey"|"altKey"]
	"27",		// escape ["n"|"none"] ("27" = escape key)
	"document.getElementsByTagName('a')[0]", // exit focus ["js-expression"]
	];


/***************************************************************\
 * NAVBAR DEFAULT STYLES
\***************************************************************/


//styles which apply to the navbar
um.navbar = [
	"0",		// nav -> menu x-offset (+-)["n" pixels]
	"+3",		// nav -> menu y-offset (+-)["n" pixels]
	"7.5em",	// width ["em"|"ex"|"px"] (vertical navbar only - horizontal navbar items have "auto" width) ("%" doesn't work right)
	];


//styles which apply to each navbar item
um.items = [
	"1",		// margin between items ["n" pixels]
	"1",		// border size ["n" pixels] (single value only)
	"collapse",	// border collapse ["collapse"|"separate"] (only applies when margin = "0")
	"#3366CC",// border colors ["color"|"#hex"|"rgb()"] (single, double or four values)
	"solid",	// border styles ["solid"|"double"|"dotted"|"dashed"|"groove"|"ridge"|"inset"|"outset"] (single, double or four values; be careful with using "none")
	"#b05010",// hover/focus border colors ["color"|"#hex"|"rgb()"] (single, double or four values)
	"solid",	// hover/focus border styles ["solid"|"double"|"dotted"|"dashed"|"groove"|"ridge"|"inset"|"outset"] (single, double or four values; be careful with using "none")
	"#3366CC",// visited border colors ["color"|"#hex"|"rgb()"] (single, double or four values)
	"solid",// visited border styles ["solid"|"double"|"dotted"|"dashed"|"groove"|"ridge"|"inset"|"outset"] (single, double or four values; be careful with using "none")
	"4",		// left/right padding ["n" pixels] (single value only)
	"2",		// top/bottom padding ["n" pixels] (single value only)
	"#FFF",		// background ["color"|"#hex"|"rgb()"|"image.gif"]
	"#ffe",		// hover/focus background ["color"|"#hex"|"rgb()"|"image.gif"]
	"#FFF",		// visited background ["color"|"#hex"|"rgb()"|"image.gif"]
	"10px",		// font size ["em"|"ex"|"%"|"px"|"pt"|"absolute-size"|"relative-size"]
	"verdana,tahoma,sans-serif",// font family ["font1,font2,font3"] (always end with a generic family name)
	"bold",		// font weight ["normal"|"bold"|"bolder"|"lighter|"100" to "900"]
	"none",		// text decoration ["none"|"underline"|"overline"|"line-through"]
	"left",		// text-align ["left"|"right"|"center"]
	"#3366CC",	// color ["color"|"#hex"|"rgb()"]
	"#EF9D00",	// hover/focus color ["color"|"#hex"|"rgb()"]
	"#3366CC",	// visited color ["color"|"#hex"|"rgb()"]
	"normal",	// font-style ["normal"|"italic"|"oblique"]
	"normal",	// hover/focus font-style ["normal"|"italic"|"oblique"]
	"normal",	// visited font-style ["normal"|"italic"|"oblique"]
	"letter-spacing:1px !important;",// additional link CSS (careful!)
	"",		// additional hover/focus CSS (careful!)
	"",		// additional visited CSS (careful!)
	"rightb.gif",// menu indicator character/image ["text"|"image.gif"|"none"]
	"righto.gif",// menu indicator rollover character/image ["text"|"image.gif"|"none"] (must be same type)
	"7",		// clipping width of indicator image ["n" pixels] (only when using image arrows)
	"..",		// alt text of indicator image ["text"] (only when using image arrows)
	];







/***************************************************************\
 * MENU DEFAULT STYLES
\***************************************************************/


//styles which apply to each menu
um.menus = [
	"0",		// menu -> menu x-offset (+-)["n" pixels]
	"-1",		// menu -> menu y-offset (+-)["n" pixels]
	"1",		// border size ["n" pixels] (single value only)
	"ButtonHighlight",// border colors ["color"|"#hex"|"rgb()"] (single, double or four values)
	"outset",	// border styles ["solid"|"double"|"dotted"|"dashed"|"groove"|"ridge"|"inset"|"outset"] (single, double or four values; be careful with using "none")
	"15em",	// width ["em"|"ex"|"px"]
	"0",		// padding ["n" pixels] (single value only)
	"#D3DCE3",	// background ["color"|"#hex"|"rgb()"|"image.gif"]
	"",		// additional menu CSS (careful!) (you can use a transition here but *not* a static filter)
	"#EF9D00",// shadow background ["color"|"#hex"|"rgb()"|"image.gif"|"none"]
	"1px",		// shadow offset (+-) ["em"|"px"|"pt"|"%"|"0"]
	"filter:progid:DXImageTransform.Microsoft.Shadow(color=Buttonshadow,direction=125,strength=2);",// additional shadow layer CSS (if you use a Microsoft.Shadow filter here then Win/IE5.5+ will do that *instead* of default shadow)
	];


//styles which apply to each menu item
// 1=top 2=right 3=bottom 4=left
um.menuItems = [
	"0",		// margin around items ["n" pixels] (single value only; margins are like table cellspacing)
	"0",		// border size ["n" pixels] (single value only)
	"collapse",	// border collapse ["collapse"|"separate"] (only applies when margin = "0")
	"#D3DCE3 #D3DCE3 #D3DCE3 #D3DCE3",	// border colors ["color"|"#hex"|"rgb()"] (single, double or four values)
	"solid",	// border styles ["solid"|"double"|"dotted"|"dashed"|"groove"|"ridge"|"inset"|"outset"] (single, double or four values; be careful with using "none")
	"#D3DCE3 #D3DCE3 #D3DCE3 #D3DCE3",		// hover/focus border colors ["color"|"#hex"|"rgb()"] (single, double or four values)
	"solid",	// hover/focus border styles ["solid"|"double"|"dotted"|"dashed"|"groove"|"ridge"|"inset"|"outset"] (single, double or four values; be careful with using "none")
	"#D3DCE3 #D3DCE3 #D3DCE3 #D3DCE3",	// visited border colors ["color"|"#hex"|"rgb()"] (single, double or four values)
	"solid",	// visited border styles ["solid"|"double"|"dotted"|"dashed"|"groove"|"ridge"|"inset"|"outset"] (single, double or four values; be careful with using "none")
	"4",		// left/right padding ["n" pixels] (single value only)
	"2",		// top/bottom padding ["n" pixels] (single value only)
	"#FFF",	// background ["color"|"#hex"|"rgb()"|"image.gif"]
	"#ffe",	// hover/focus background ["color"|"#hex"|"rgb()"|"image.gif"]
	"#FFF",	// visited background ["color"|"#hex"|"rgb()"|"image.gif"]
	"10px",		// font size ["em"|"ex"|"%"|"px"|"pt"|"absolute-size"|"relative-size"]
	"tahoma,sans-serif",// font family ["font1,font2,font3"] (always end with a generic family name)
	"bold",	// font weight ["normal"|"bold"|"bolder"|"lighter|"100" to "900"]
	"none",		// text decoration ["none"|"underline"|"overline"|"line-through"]
	"left",		// text-align ["left"|"right"|"center"]
	"#3366CC",		// color ["color"|"#hex"|"rgb()"]
	"#EF9D00",		// hover/focus color ["color"|"#hex"|"rgb()"]
	"#3366CC",		// visited color ["color"|"#hex"|"rgb()"]
	"normal",	// font-style ["normal"|"italic"|"oblique"]
	"normal",	// hover/focus font-style ["normal"|"italic"|"oblique"]
	"normal",	// visited font-style ["normal"|"italic"|"oblique"]
	"",		// additional link CSS (careful!)
	"",		// additional hover/focus CSS (careful!)
	"",		// additional visited CSS (careful!)
	"rightb.gif",// submenu indicator character/image ["text"|"image.gif"|"none"]
	"righto.gif",// submenu indicator rollover character/image ["text"|"image.gif"|"none"] (must be the same type)
	"3",		// clipping width of indicator image ["n" pixels] (only when using image arrows)
	"..",		// alt text of indicator image ["text"] (only when using image arrows)
	];


