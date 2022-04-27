<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <title>Chat Século</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <style type="text/css">
        * {
    padding:0;
    margin:0;
    box-sizing: border-box;
    font-family: 'Segoe UI', 'Arial';
}

body{
    display: flex;
}

aside {
    background: #FFAF71;
    width: 650px;
    height: 100vh;
    display: grid;
    grid-template-columns: 1fr 1fr 1fr;
    /*grid-template-rows: 460px 160px 70px;*/
    grid-template-rows: 50% 25% 25%;
    align-items: center;
}

aside > img {
    grid-row: 1/2;
    grid-column: 2/3;
    margin:0 auto;
    width: 215px;
    height: 215px;
}

form {
    grid-row: 2/3;
    grid-column: 2/3;
    align-self: flex-end;
}

form > input{
    width: 374px;
    height: 40px;
    margin-bottom: 20px;
    border:0;
    border-radius: 5px;
    background: #EEEEEE;
    opacity: .7;
    padding: 10px 20px;
}

aside > button{
    width: 374px;
    height: 40px;
    grid-row: 3;
    grid-column: 2/3;
    border:0;
    border-radius: 5px;
    background: #232F48;
    color:#FBFBFB;
    text-align: center;
}

aside > button:hover{
    opacity: .8;
    box-shadow: 2px 2px 2px #444;
    transition: all .3s;
    cursor: pointer;
}

section {
    background: #FFFFFF;
    width: calc(100% - 650px);
    height: 100vh;
    padding: 40px 50px;
}

.me {
    display: flex;
    align-items: center;
    text-align: left;
    justify-content: flex-start;
    margin: 25px 0px;
}

.me > img {
    width: 53px;
    height: 47px;
    margin-right: 35px;
}

.me > .text > h5, .other > .text > h5{
    font-size: 15px;
    color: #232F48;
}

.me > .text > p, .other > .text > p{
    font-size: 15px;
    color: #232F48;
    opacity: .68;
}

.other {
    display: flex;
    align-items: center;
    text-align: right;
    margin: 25px 0px;
    flex-direction: row-reverse;
}

.other > img {
    width: 53px;
    height: 47px;
    margin-left: 35px;
    justify-self: flex-end;
}

/*Media Queries*/

@media (max-width: 1250px){
    aside {
        width: 320px;
    }

    aside > img {
        width: 155px;
        height: 155px;
    }

    form > input{
        width: 250px;
    }
    
    aside > button{
        width: 250px;
    }

    section {
        width: calc(100% - 320px);
        padding: 30px 40px;
    }

    .me > img {
        width: 50px;
        height: 43px;
        margin-right: 33px;
    }
}

@media (max-width: 650px){
    aside {
        width: 240px;
    }

    aside > img {
        width: 115px;
        height: 115px;
    }

    form > input{
        width: 210px;
        padding: 10px 15px;
    }
    
    aside > button{
        width: 210px;
    }

    section {
        width: calc(100% - 240px);
        padding: 20px 30px;
    }

    .me > img {
        width: 30px;
        height: 25px;
        margin-right: 20px;
    }

    .me > .text > h5, .other > .text > h5{
        font-size: 14px;
    }
    
    .me > .text > p, .other > .text > p{
        font-size: 14px;
    }
}

        
    </style>
</head>
<body>
    <aside>
        <!-- <img src="assets/imgs/Icon ionic-ios-chatboxes.png" alt="Chat" title="Chat"/> -->

        <form id="form1">
            <input type="text" placeholder="Digite seu nome..." name="name" id="name" />
            <input type="text" placeholder="Digite sua mensagem..." name="message" id="message" />
        </form>

        <button id="btn1">Enviar</button>
    </aside>

    <section id="content">
        
    </section>

    <script src="<?= base_url('assets/js/chat.js'); ?>"></script>
</body>
</html>
