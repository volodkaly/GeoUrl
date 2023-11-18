const { createApp } = Vue;
createApp({

    data() {
    return {           
        items: [ 
        {
            itemName: 'PC',
            itemPrice: 1000,
            itemCount: 0
        }
        ]
       
        }

    }
    ,
    methods:
    {
            addItem(){

                const newItem = {
                    itemName: string = this.itemName,
                    itemPrice: number = this.itemPrice,
                    itemCount: number = this.itemCount
                }
                this.items.push(newItem);
            }        

    }
}).mount('#app');