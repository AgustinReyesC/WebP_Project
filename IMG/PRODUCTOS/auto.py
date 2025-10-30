import shutil


# Archivo original
archivo_origen = "./IMG/PRODUCTOS/prod00.jpg"

# Copiarlo 29 veces con nombres prod01.jpg hasta prod29.jpg
for i in range(1, 30):
    nuevo_nombre = f"./IMG/PRODUCTOS/prod{i:02}.jpg"  # Formato con dos dígitos
    shutil.copyfile(archivo_origen, nuevo_nombre)
    print(f"{archivo_origen} copiado como {nuevo_nombre}")
