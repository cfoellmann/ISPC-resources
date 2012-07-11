// Put this file in Program Files\Adobe\Photoshop\Presets\Scripts\
// In PhotoShop menu File > Automate > Scripts: layersToSprite.js

// Arrange layers into a sprite sheet. 

if (documents.length > 0) 
{
    // This is the only thing that needs adjusted depending on how many vertical columns you want your frames pushed into
var cols = 1;
// --------------------------
docRef = activeDocument;    
var activeLayer = docRef.activeLayer;

numLayers = docRef.artLayers.length;
var rows = Math.ceil(numLayers/cols);
 	var spriteX = docRef.width;
 	var spriteY = docRef.height;	
// put things in order
app.preferences.rulerUnits = Units.PIXELS;
// resize the canvas
 	newX = spriteX * cols;
 	newY = spriteY * rows;
 	
 	docRef.resizeCanvas( newX, newY, AnchorPosition.TOPLEFT );
 	
// move the layers around
 	var rowi = 0;
 	var coli = 0;
 	
 	for (i=(numLayers - 1); i >= 0; i--) 
 	{
 	docRef.artLayers[i].visible = 1;
 	
  	var movX = spriteX*coli;
  	var movY = spriteY*rowi;
  	
 	docRef.artLayers[i].translate(movX, movY);
 	
 	coli++;
 	if (coli > (cols - 1)) 
 	{
rowi++;
coli = 0;
 	}
 	}
}

