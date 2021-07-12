window.onload = main;

function main(){
    const accounts= document.getElementById("btn-showall");
    accounts.addEventListener('click',e =>{
        location.href=`/`;
        });

        const account= document.getElementById("btn-getdata");
        account.addEventListener('click',e =>{
            const id= document.getElementById("text-accountId").value;
            
            location.href=`/${id}`;
            });
    
}
