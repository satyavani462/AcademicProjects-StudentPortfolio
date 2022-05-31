function displayTime(){
    let time=new Date();
    let dt=time.getDate();
    let mn=time.getMonth();
    let year=time.getFullYear();
    const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"];    
    let hours=time.getHours();
    // hours=hours%12;
    // hours=hours?hours:12;
    let mins=time.getMinutes();
    mins=mins<10 ? '0'+mins:mins;
    let secs=time.getSeconds();
    var ampm = hours >= 12 ? 'pm' : 'am';
    //console.log(dt+" "+monthNames[time.getMonth()]+" "+year+","+hours+":"+mins+":"+secs+ampm);
    document.getElementById('time').innerHTML=dt+" "+monthNames[time.getMonth()]+" "+year+","+hours+"-"+mins+"-"+secs+" "+ampm;
    setInterval(displayTime,1000);
}