export class CookieUtils {
  static getCookieId(cookieName) {
    // Obtener todas las cookies del navegador
    let cookies = document.cookie.split(";");

    // Buscar la cookie específica por su nombre
    for (let i = 0; i < cookies.length; i++) {
      let cookie = cookies[i].trim();

      // Verificar si la cookie coincide con el nombre buscado
      if (cookie.indexOf(cookieName + "=") === 0) {
        // Extraer y devolver el valor de la cookie
        return cookie.substring(cookieName.length + 1);
      }
    }
    // Si no se encuentra la cookie, devolver un valor nulo o vacío
    return null;
  }

  static setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}
}