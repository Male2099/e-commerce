import axios from "axios";
import router from "../../router";
const API_URL = import.meta.env.VITE_API_BASE_URL;

const getToken = () => {
  const cookies = document.cookie.split("; ");
  const tokenCookie = cookies.find((cookie) =>
    cookie.startsWith("M-Donut-Token=")
  );
  if (!tokenCookie) {
    return false;
  }
  return decodeURIComponent(tokenCookie.split("=")[1]);
};

const auth = {
  async register(data) {
    try {
      const res = await axios.post(API_URL + "/api/register", data, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
        },
      });
      if (res.status === 201) {
        await this.login({ email: data.email, password: data.password });
        return true;
      }
    } catch (err) {
      console.error(err.response.data.errors);
      return false;
    }
  },

  async login(data) {
    try {
      const res = await axios.post(API_URL + "/api/login", data, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
        },
      });
      if (res.status === 200) {
        const token = res.data.token;
        const expires = new Date();
        expires.setDate(expires.getDate() + 15); // Expires in 15 days
        document.cookie = `M-Donut-Token=${encodeURIComponent(
          token
        )};expires=${expires.toUTCString()};path=/`;
        router.push("/admin");
        return true;
      } else return false;
    } catch (err) {
      console.error(err.response.data.errors);
      return false;
    }
  },

  async logout() {
    try {
      if (!getToken()) {
        return true;
      }
      const res = await axios.post(API_URL + "/api/logout", null, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      document.cookie =
        "M-Donut-Token=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
      return res.status === 200;
    } catch (err) {
      console.error(err);
      return false;
    }
  },

  async getMe() {
    if (!getToken()) return;
    try {
      const res = await axios.get(API_URL + "/api/users/me", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status == 200) {
        return res;
      } else return false;
    } catch (e) {
      document.cookie =
        "M-Donut-Token=;expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;";
    }
  },
  async deleteMe() {
    try {
      const res = await axios.delete(API_URL + "/api/users", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      return res.status == 200 ? res : false;
    } catch (err) {
      console.error(err);
      return false;
    }
  },
  async updateMe(data) {
    try {
      const res = await axios.patch(API_URL + "/api/users", data, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      return res.status == 200 ? res : false;
    } catch (err) {
      console.error(err);
      return false;
    }
  },
  async allUsers() {
    try {
      const res = await axios.get(API_URL + "/api/users", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      return res.status == 200 ? res.data : false;
    } catch (err) {
      console.error(err);
      return false;
    }
  },
  async ban(id) {
    try {
      const res = await axios.post(API_URL + "/api/users/ban/"+id, null, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      return res.status == 200 ? res.data : false;
    } catch (err) {
      console.error(err);
      return false;
    }
  },
  async unban(id) {
    try {
      const res = await axios.post(API_URL + "/api/users/unban/"+id, null, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      return res.status == 200 ? res.data : false;
    } catch (err) {
      console.error(err);
      return false;
    }
  },
};

export default auth;
