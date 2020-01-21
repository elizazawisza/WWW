var puzzleImage = document.getElementById("puzzleImage");
var buttonNewGame = document.getElementById("buttonNewGame");
var sliderSelectSize = document.getElementById("sliderSelectSize");
var puzzleSize = document.getElementById("puzzleSize");

/* Global Variables */

var nSize; // number of tiles along a side of the board
var nTiles; // total number of tiles on the board
var EMPTY_SPACE; // object indicating the empty space
var tileHeight, tileWidth; // pixel size of a tile
var tileImage;  // array holding individual tile image objects
var tiles; // array holding pointers to tile image objects
var gameStarted; // game state variable
var Empty_Position;
var isMobile = false, canvas, gctx;


function main() {

    // Set up event handlers
    canvas.addEventListener("click", playerMove);
    canvas.addEventListener("mousemove", hoverMouse);
    sliderSelectSize.addEventListener("change", changeSize);
    buttonNewGame.addEventListener("click", beginNewGame);

    // Define globals
    gameStarted = true;
    nSize = parseInt(sliderSelectSize.value);
    puzzleSize.innerHTML = nSize + " tiles by " + nSize + " tiles";
}


function beginNewGame() {
    gameStarted = true;
    initializeBoard();
    shuffleTiles();
}


function changeSize() {
    nSize = parseInt(sliderSelectSize.value);
    puzzleSize.innerHTML = nSize + " tiles by " + nSize + " tiles";
    gameStarted = false;
    initializeBoard();
}

function hoverMouse(event) {
    removeHover()
    if(gameStarted) {
       let tile =  getSelectedTile(event);
        var rect, x, y;
        rect = canvas.getBoundingClientRect();
        x = Math.floor((event.clientX - rect.left) / tileWidth);
        y = Math.floor((event.clientY - rect.top) / tileHeight);

        if (!isMobile) {
            displayHover(tile, x, y, rect)
        }

    }
}

function removeHover(){
    const elements = document.getElementsByClassName("hoverElement");

    while (elements.length > 0) elements[0].remove();
}

function displayHover(tile, x, y, rect){
    let isNeighbour = false
    let width = tileImage[tile].width
    let height = tileImage[tile].height
    if(tile >= nSize && tiles[tile - nSize] === EMPTY_SPACE) {
        isNeighbour = true
    } else if(tile % nSize > 0 && tiles[tile - 1] === EMPTY_SPACE) {
        isNeighbour = true
    } else if(tile % nSize < nSize - 1 && tiles[tile + 1] === EMPTY_SPACE) {
        isNeighbour = true
    } else if(tile < nSize * (nSize - 1) &&
        tiles[tile + nSize] === EMPTY_SPACE) {
        isNeighbour = true
    }else{
        isNeighbour = false
    }
    if(isNeighbour === true){
        var tableRectDiv = document.createElement('div');
        tableRectDiv.className = "hoverElement";
        tableRectDiv.style.position = 'absolute';
        tableRectDiv.style.background = 'rgba(255, 255, 255, 0.38)';
        tableRectDiv.style.margin = tableRectDiv.style.padding = '0';
        tableRectDiv.style.top = (rect.top + y*tileHeight ) + 'px';
        tableRectDiv.style.left = (rect.left + x * tileWidth ) + 'px';
        tableRectDiv.style.width = width + 'px';
        tableRectDiv.style.height = height + 'px';
        tableRectDiv.addEventListener("click", playerMove);
        document.body.appendChild(tableRectDiv);
    }

}


function playerMove(event) {
    removeHover()
    if(gameStarted) {
        exchangeTiles(getSelectedTile(event));
    }
}


function initializeBoard() {

    var i, j;

    nTiles = nSize * nSize;
    EMPTY_SPACE = nTiles - 1;
    tileHeight = Math.floor(canvas.height / nSize);
    tileWidth = Math.floor(canvas.width / nSize);


    tiles = [];
    for(i = 0; i < nTiles; i++) {
        tiles.push(i);
    }

    loadImage();
    tileImage = [];

    for(i = 0; i < nSize; i++) {
        for(j = 0; j < nSize; j++) {
            tileImage[nSize * i + j] = gctx.getImageData(j * tileWidth,
                i * tileHeight, tileWidth, tileHeight);
        }
    }
}

function shuffleTiles() {
    var i, j;
    var emptyRow, inversions;


    gctx.clearRect((nSize - 1) * tileWidth, (nSize - 1) * tileHeight,
        tileWidth, tileHeight);

    tileImage[nTiles - 1] = gctx.getImageData((nSize - 1) * tileWidth,
        (nSize - 1) * tileHeight, tileWidth, tileHeight);

    shuffleArray(tiles);

    inversions = 0;
    for(i = 0; i < nTiles; i++) {
        for(j = i + 1; j < nTiles; j++) {
            if(tiles[i] > tiles[j] && tiles[i] !== EMPTY_SPACE) {
                inversions++;
            }
        }
    }
    if(nSize % 2 === 1) {
        // Case 1: puzzles with an odd number of rows
        if(inversions % 2 === 1) {
            changeParity();
        }
    } else {
        // Case 2: puzzles with an even number of rows
        // First find the row containing the empty space.
        for(i = 0; i < nTiles; i++) {
            if(tiles[i] === EMPTY_SPACE) {
                emptyRow = Math.floor(i/nSize) + 1;
            }
        }
        // Next modify the shuffle (if necessary) to change the parity.
        if((inversions + nSize - emptyRow) % 2 === 1) {
            changeParity();
        }
    }
    loadImageTiles()
}

function setEmptyTile() {
    for(Empty_Position-1;  Empty_Position>=0; Empty_Position--){
        exchangeTiles(Empty_Position)
    }

}

function exchangeTiles(tile) {
    var emptyLocation;

    if(tile >= nSize && tiles[tile - nSize] === EMPTY_SPACE) {
        emptyLocation = tile - nSize;
    } else if(tile % nSize > 0 && tiles[tile - 1] === EMPTY_SPACE) {
        emptyLocation = tile - 1;
    } else if(tile % nSize < nSize - 1 && tiles[tile + 1] === EMPTY_SPACE) {
        emptyLocation = tile + 1;
    } else if(tile < nSize * (nSize - 1) &&
        tiles[tile + nSize] === EMPTY_SPACE) {
        emptyLocation = tile + nSize;
    } else {
        return; // invalid move
    }


    tiles[emptyLocation] = tiles[tile];
    tiles[tile] = EMPTY_SPACE;


    gctx.putImageData(tileImage[tiles[emptyLocation]],
        (emptyLocation % nSize) * tileWidth,
        Math.floor(emptyLocation / nSize) * tileHeight);
    gctx.putImageData(tileImage[tiles[tile]],
        (tile % nSize) * tileWidth,
        Math.floor(tile / nSize) * tileHeight);

    if(isSolved()) {
        setTimeout(beginNewGame,3000);
    }
}

function getSelectedTile(event) {
    var rect, x, y;
    rect = canvas.getBoundingClientRect();
    x = Math.floor((event.clientX - rect.left) / tileWidth);
    y = Math.floor((event.clientY - rect.top) / tileHeight);
    return x + nSize * y;
}

function isSolved() {
    var i;

    for(i = 0; i < nTiles - 1; i++) {
        if(tiles[i] > tiles[i + 1]) {
            return false;
        }
    }
    return true;
}

function shuffleArray(array) {
    var i, j, temp;

    for(i = array.length - 1; i > 0; i--) {
        j = Math.floor(Math.random() * (i + 1));
        temp = array[i];
        array[i] = array[j];
        array[j] = temp;
    }
    return array;
}

function changeParity() {
    /*
     *  Changes the parity (number of inversions) from odd to even
     *  or from even to odd.
     */
    var temp;

    if(tiles[0] === EMPTY_SPACE || tiles[1] === EMPTY_SPACE) {
        temp = tiles[nTiles - 1];
        tiles[nTiles - 1] = tiles[nTiles - 2];
        tiles[nTiles - 2] = temp;
    } else {
        temp = tiles[0];
        tiles[0] = tiles[1];
        tiles[1] = temp;
    }
}


function loadImageTiles() {
    var i, j;

    if(!gameStarted) {
        loadImage();
    } else {
        for (i = 0; i < nSize; i++) {
            for(j = 0; j < nSize; j++) {
                if(tiles[nSize * i + j]=== EMPTY_SPACE){
                    Empty_Position = nSize * i + j
                }
                gctx.putImageData(tileImage[tiles[nSize * i + j]],
                    j * tileWidth, i * tileHeight);
            }
        }
        setEmptyTile()
    }
}

function loadImage() {
    gctx.drawImage(puzzleImage, 0, 0, canvas.width, canvas.height);
}

function getImage(url) {
    return new Promise(
        function (resolve, reject) {
            var img = new Image();
            img.onload = function () {
                resolve(url);
            };
            img.onerror = function () {
                reject(url);
            };
            img.src = url;
        });
}

function onSuccess(url) {
    document.getElementById("puzzleImage").src = url;
    initializeBoard()
}

function onFailure(url) {
    console.error("Error loading " + url);
}

function loadFull(image) {
    var promise = getImage(image);
    promise.then(onSuccess).catch(onFailure);
}

window.addEventListener("load", () => {
    isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
    if(isMobile === true){
        canvas = document.getElementById("gameCanvasMobile");
        gctx = canvas.getContext("2d");
    }else{
        canvas = document.getElementById("gameCanvas");
        gctx = canvas.getContext("2d");
    }
    main()

    loadFull("img/xmas1.jpg");

    document.querySelectorAll("button").forEach((button, i) => {
        button.addEventListener("click", () => loadFull(`img/xmas${i + 1}.jpg`));
    });

});
