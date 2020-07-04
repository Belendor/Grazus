const form = document.querySelector("#form")
const submit = document.querySelector("#submit")
const formInput = document.querySelector("#form-input")
const alert = document.querySelector(".alert-box")
const accept = document.querySelector(".alert-button")
const decline = document.querySelector(".alert-decline")
const messageBox = document.querySelector(".message-box")
const select1 = document.querySelector("#select1")
const select2 = document.querySelector("#select2")

const USDtoEURRate = Number(document.querySelector("#USDtoEUR").innerHTML)
const EURtoUSDRate = Number(document.querySelector("#EURtoUSD").innerHTML)

let selectText1 = select1.options[select1.selectedIndex].text
let selectText2 = select2.options[select2.selectedIndex].text

select1.addEventListener("change", ()=>{
    selectText1 = select1.options[select1.selectedIndex].text
})
select2.addEventListener("change", ()=>{
    selectText2 = select2.options[select2.selectedIndex].text
})

formInput.addEventListener("input", ()=>{

    if(formInput.value.length != 0){

        submit.addEventListener("click", (e)=>{
        
            if(formInput.value == ''){
        
            }else{
                e.preventDefault()
                alert.style.visibility = "visible";
                messageBox.innerHTML = generateMessage(formInput.value, selectText1, selectText2); 
            }
        
        }, {once : true})
        
        accept.addEventListener("click", ()=>{
            submit.click();
        })
        
        decline.addEventListener("click", ()=>{
            alert.style.visibility = "hidden";
        
            submit.addEventListener("click", (e)=>{
            
                e.preventDefault()
                alert.style.visibility = "visible";
                messageBox.innerHTML = generateMessage(formInput.value, selectText1, selectText2); 
        
            }, {once : true})
        })
    
    }
})


function generateMessage(sum, from, to){
    if(from == 'EUR' && to == 'EUR'){
       return `Ar tikrai norite iskeisti ${sum} EUR į  ${sum} EUR?`;
    }
    if(from == 'USD' && to == 'USD'){
       return `Ar tikrai norite iskeisti ${sum} USD į  ${sum} USD?`;
    }
    if(from == 'USD' && to == 'EUR'){
       return `Ar tikrai norite iskeisti ${sum} USD į  ${(USDtoEURRate * sum).toFixed(2)} EUR?`;
    }
    if(from == 'EUR' && to == 'USD'){
       return `Ar tikrai norite iskeisti ${sum} EUR į  ${(EURtoUSDRate * sum).toFixed(2)} USD?`;
    }
}




