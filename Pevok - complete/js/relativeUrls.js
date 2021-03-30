function rewriteRelativePortUrls() {
    var links = document.getElementsByTagName("a");
    for (var i=0,max=links.length; i<max; i++)
    {
        var port = links[i].getAttribute("href").match(/^:(\d+)(.*)/);
        if (port)
        {
            newURL = window.location.origin + port[0]
            links[i].setAttribute("href",newURL)
        }    
    }
}