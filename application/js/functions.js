/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
function abreTela(sController, sMetodo) {
    console.log(em_branco(sMetodo));
    if (!em_branco(sController)) {
        $("#content .centered").load('../'+sController+'/'+sMetodo);
    }
}

// Retira os espaços em branco da direita
function rtrim_js(str)
{ // ms
    var tam, i, retorno;
    str = new String(str);
    tam = str.length;
    i = 0;
    while (str.charAt(i) == ' ')
        i++;
    retorno = new String(str.substr(i,tam - i));
    return retorno;
}

// Retira os espaços em branco da esquerda
function ltrim_js(str){ // ms
    var tam, pos, i, retorno;
    str = new String(str);
    tam = str.length;
    pos = 0;
    i = tam-1;
    while (str.charAt(i) == ' ')
    {
        pos++;
        i--;
    }
    retorno = new String(str.substr(0,tam - pos));
    return retorno;
}

// Retira os espaços em branco da direita e esquerda
function trim_js(str) { // ms
    var str_l, str_r;

    str_l = ltrim_js(str);
    str_r = rtrim_js(str_l);
    return str_r;
}

function em_branco(strValor) {
    return (trim_js(strValor).length == 0) ? true : false;
}




