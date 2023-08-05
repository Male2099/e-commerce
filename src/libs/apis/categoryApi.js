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

const categories = {
  async create(data) {
    try {
      if (data.desc === "") data.desc = "no description";
      const res = await axios.post(API_URL + "/api/categories", data, {
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
      const res = await axios.get(API_URL + "/api/categories/" + id, {
        headers: {
          accept: "application/json",
          "Content-Type": "application/json",
          // Authorization: `Bearer ${getToken()}`,
        },
      });
      if (res.status === 200) {
        // console.log(res);
        return res.data.category.products;
      }
    } catch (err) {
      console.error(err.response.data.errors);
    }
    return false;
  },
  async delete(id) {
    try {
      const res = await axios.delete(API_URL + "/api/categories/" + id, {
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
      console.error(err.response.data.errors);
    }
    return false;
  },
  async update(data) {
    try {
      const res = await axios.patch(
        API_URL + "/api/categories/" + data.id,
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
      const res = await axios.get(API_URL + "/api/categories", {
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

export default categories;
