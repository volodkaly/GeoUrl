new Vue({
el: '#app',
data:{
    link: 'https://www.google.com',
    format: 'text-decoration: line-through',
    people: 
    [{
        name: 'john8',
        job: 'blow',
    },
    {
        name: 'john5',
        job: 'blow3',
    },
    {
        name: 'john3',
        job: 'blow4',
    },
    {
        name: 'john9',
        job: 'blow5',
    },
    {
        name: 'john4',
        job: 'blow6',
    }
    ],
    count:0,
    checked: true,
    items: [
    {
        itemName:'332',
        itemPrice:'42'
    },
    {
        itemName:'332wr',
        itemPrice:'4wr2'
    },

]
    
},
methods: {
addTen: function () {
    this.count = this.count + 10;
},
pushItem() {
   const newItem = {
    itemName: this.itemName,
    itemPrice: this.itemPrice
};
    this.items.push(newItem);
}

}
})