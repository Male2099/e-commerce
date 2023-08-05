import axios from "axios";

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

const products = {
  async create(data) {
    try {
      if (!data.desc) data.desc = "no description";
      const res = await axios.post(API_URL + "/api/products", data, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 201) {
        return true;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async get(id) {
    try {
      const res = await axios.get(API_URL + "/api/products/" + id, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return res.data;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async delete(id) {
    try {
      const res = await axios.delete(API_URL + "/api/products/" + id, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return true;
      }
    } catch (err) {
      console.error(err.response);
    }
    return false;
  },
  async update(data) {
    try {
      const res = await axios.patch(
        API_URL + "/api/products/" + data.id,
        data,
        {
          headers: {
            accept: "application/json",
            "Content-Type": "application/json",
            Authorization: `Bearer ${getToken()}`,
          },
        }
      );
      if (res.status === 200) {
        return true;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async all() {
    try {
      const res = await axios.get(API_URL + "/api/products", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return res.data;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async discount() {
    try {
      const res = await axios.get(API_URL + "/api/products/discount", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return res.data;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async welcomeOffer() {
    try {
      const res = await axios.get(API_URL + "/api/products/welcome-offer", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return res.data;
      }
    } catch (err) {
      console.error(err.response.data);
    }
    return false;
  },
  
  async special() {
    try {
      const res = await axios.get(API_URL + "/api/products/special", {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        return res.data;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
};

export default products;
