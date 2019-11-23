echo "-------------------------------------"
echo "| Ejecución repetitiva de los TESTS |"
echo "-------------------------------------"

echo ""
echo "Agregue la ruta del test por ejecutar [por defecto todos]:"
read -e pathTest

echo ""
echo "Ingrese la cantidad de iteraciones:"
read iteraciones

for ((i = 1; i <= iteraciones; i++))
do
    echo "Iteración nro $i"
    "vendor/bin/phpunit" "$pathTest"
    echo ""
done
