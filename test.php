<style>
.top {
    height: 15%;
    background: green;
}
.bot {
    display: grid;
    height: 85%;
    background: red;
    grid-template-columns: repeat(2,50%);
    grid-template-rows: repeat(2,50%);
}
.foor {
    height: 15%;
}
.hearder {
    width: 100%;
    height: 100%;
    margin-right: -4px;
}
.left {
    grid-row-start: 1;
    grid-row-end: 3;
    background: yellow;
}
.right1 {
    height: 100%;
    background: gray;
}
.right2 {
    height: 100%;
    background: pink;
}

html, body {
    height: 100%;
    padding: 0;
    margin: 0;
}
</style>
<div class="top">
   <div class="hearder">img</div>
</div>

<!-- BOT 50% -->
<div class="bot">
    <div class="left">text</div>
    <div class="right1">text</div>
    <div class="right2">text</div>
</div>
<!--
<div class="foor">
    <div>text</div>
</div> -->