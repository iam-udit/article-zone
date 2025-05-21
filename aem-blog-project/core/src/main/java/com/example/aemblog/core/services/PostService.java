package com.example.aemblog.core.services;

import org.apache.sling.api.resource.Resource;
import org.apache.sling.api.resource.ResourceResolver;
import java.util.List;
import java.util.Map; // For potential filter maps

public interface PostService {
    List<Resource> getPosts(ResourceResolver resourceResolver, String parentPath, int limit, int offset, String categoryId, String tagId, String sortBy, String sortOrder);
    Resource getPostBySlug(ResourceResolver resourceResolver, String postResourcePath); // Assuming slug is part of path or a property
    long getTotalPosts(ResourceResolver resourceResolver, String parentPath, String categoryId, String tagId);
    // Add methods for popular/recent posts later if needed
    // e.g., List<Resource> getPopularPosts(ResourceResolver resourceResolver, String parentPath, int limit);
    // List<Resource> getRecentPosts(ResourceResolver resourceResolver, String parentPath, int limit);
}
