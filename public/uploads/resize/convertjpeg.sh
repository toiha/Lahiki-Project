

for f in `find ./photos -maxdepth 2 -name "*.jpg" `
do
    convert $f -resize 150x $f
done
