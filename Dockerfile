FROM php

COPY ./ ./

EXPOSE 3000

CMD ["php","-S", "0.0.0.0:3000"]


#commands:
#docker build . -t php --no-cache
#docker run -itd --name=php -p=3000:3000 -v /home/vladimir/Desktop/my-data:/app php

#u must type the adress of volume inside the running container to access volume, in our case its app
#for example http://localhost:3000/app/another.php