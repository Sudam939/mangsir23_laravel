<?php


function uploadImage($request, $name, $object)
{
    if ($request->hasFile($name)) {
        $file = $request->file($name);
        $fileName = time() . "." . $file->getClientOriginalExtension();
        $file->move('images', $fileName);
        $object->image = 'images/' . $fileName;
    }
}
